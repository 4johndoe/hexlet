Реализуйте структуру данных tree. Каждый узел в этом дереве (лист или поддерево) может содержать значение. Это значение устанавливается в соответствующий узел через конструктор Tree или Leaf и извлекается через метод getValue. Каждое поддерево может иметь сколько угодно потомков (детей).
Сделайте класс Leaf финальным.
Сделайте метод getValue финальным.
Node должна реализовывать интерфейс NodeInterface.
Tree и Leaf должны наследовать от класса Node, который содержит в себе общую логику, описанную в интерфейсе NodeInterface.
Пример:

    $tree = new \tree\Tree(1);
    1 == $tree->getValue();

    $leaf = new \tree\Leaf(2);
    $tree->addChild($leaf);

    $child = new \tree\Tree(3);
    $child->addChild(new \tree\Leaf(4));
    $tree->addChild($child);

    2 == $tree->getChildren();
