DROP TABLE IF EXISTS "cars";

CREATE TABLE cars (
  id integer PRIMARY KEY,
  name character varying UNIQUE NOT NULL,
  price numeric,
  created_at timestamp NOT NULL
)

-- schema
select * from schema.TABLE;

create schema myschema;
-- \dt
