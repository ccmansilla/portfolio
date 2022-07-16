CREATE TABLE proyectos (
  id serial PRIMARY KEY,
  nombre varchar(500) NOT NULL,
  imagen varchar(500) NOT NULL,
  descripcion text NOT NULL,
  url varchar(500) NOT NULL
);

CREATE TABLE mensajes (
  id serial PRIMARY KEY,
  nombre varchar(500) NOT NULL,
  email varchar(500) NOT NULL,
  texto text NOT NULL
);




