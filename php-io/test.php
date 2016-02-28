class Db {
  const ZERO = 0x00;

      private $db;

      public function __construct($file)
      {
          if (!file_exists($file)) {
              touch($file);
          }
          $this->db = new \SplFileObject($file, 'r+');
      }

      public function get($key)
      {
          $this->db->rewind();
          while (!$this->db->eof()) {
              $possibleKey = trim($this->db->fread(self::KEY_LENGTH), self::ZERO);
              if ($key === $possibleKey) {
                  return trim($this->db->fread(self::VALUE_LENGTH), self::ZERO);
              }
          }

          throw new Db\NotFoundException("'$key' is not exists");
      }

      public function set($key, $value)
      {
          $this->db->rewind();
          while (!$this->db->eof()) {
              $possibleKey = trim($this->db->fread(self::KEY_LENGTH), self::ZERO);
              if ($key === $possibleKey) {
                  $this->write($value, self::VALUE_LENGTH);
                  return;
              }
          }

          $this->write($key, self::KEY_LENGTH);
          $this->write($value, self::VALUE_LENGTH);
      }

      private function write($data, $length)
      {
          $zeroLength = $length - strlen($data);
          $this->db->fwrite($data);
          $this->db->fwrite(str_repeat(self::ZERO, $zeroLength));
      }
}
