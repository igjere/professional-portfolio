-- -----------------------------------------------------
-- Table production_group
-- -----------------------------------------------------
CREATE TABLE production_group (
  prod_fname VARCHAR(20),
  prod_lname VARCHAR(20),
  prod_email VARCHAR(25),
  prod_phone INT,
  prod_id INT PRIMARY KEY,
  contribution DOUBLE(10,2)
);

-- -----------------------------------------------------
-- Table agents
-- -----------------------------------------------------
CREATE TABLE agents (
  agent_fname VARCHAR(20),
  agent_lname VARCHAR(20),
  agent_phone INT,
  agent_id INT PRIMARY KEY,
  agent_salary DECIMAL(10,2)
  );

-- -----------------------------------------------------
-- Table clients
-- -----------------------------------------------------
CREATE TABLE clients (
  client_id INT PRIMARY KEY,
  client_type ENUM('Director', 'Actor', 'Artist', 'Producer'),
  client_fname VARCHAR(20),
  client_lname VARCHAR(20),
  client_email VARCHAR(25),
  client_phone INT,
  client_availability SET('M', 'T', 'W', 'Th', 'F') NULL,
  agent_id INT,
  FOREIGN KEY(agent_id) REFERENCES agents(agent_id)
  );


-- -----------------------------------------------------
-- Table movies
-- -----------------------------------------------------
CREATE TABLE movies (
  movie_genre ENUM('Action', 'Horror', 'Comedy', 'Drama', 'Thriller', 'Scifi', 'Romantic'),
  movie_budget DECIMAL(10,2),
  movie_id INT PRIMARY KEY,
  prod_id INT,
  FOREIGN KEY (prod_id) REFERENCES production_group(prod_id)
 );


-- -----------------------------------------------------
-- Table jobs
-- -----------------------------------------------------
CREATE TABLE jobs (
  job_id INT PRIMARY KEY,
  job_name ENUM('Director', 'Actor', 'Stage Manager', 'Production Manager'),
  rate DECIMAL(10,2),
  start_date DATE,
  end_date DATE
  );


-- -----------------------------------------------------
-- Table contracts
-- -----------------------------------------------------
CREATE TABLE contracts (
  contract_id INT PRIMARY KEY,
  client_id INT,
  movie_id INT,
  job_id INT,
  FOREIGN KEY (client_id) REFERENCES clients(client_id),
  FOREIGN KEY (movie_id) REFERENCES movies(movie_id),
  FOREIGN KEY (job_id) REFERENCES jobs(job_id)
  );


-- -----------------------------------------------------
-- Table sponsors
-- -----------------------------------------------------
CREATE TABLE sponsors (
  sponsor_id INT PRIMARY KEY,
  product_name VARCHAR(45),
  product_type VARCHAR(45),
  contribution DECIMAL(10,2)
  );

-- -----------------------------------------------------
-- Table sponsor_movie
-- -----------------------------------------------------
CREATE TABLE sponsor_movie (
  sponsor_id INT PRIMARY KEY,
  movie_id INT,
  FOREIGN KEY (sponsor_id) REFERENCES sponsors(sponsor_id),
  FOREIGN KEY (movie_id) REFERENCES movies(movie_id)
  );

-- -----------------------------------------------------
-- Table client_preferences
-- -----------------------------------------------------
CREATE TABLE client_preferences (
  client_id INT PRIMARY KEY,
  desired_genre VARCHAR(45),
  desired_role VARCHAR(45),
  desired_pay VARCHAR(45),
  FOREIGN KEY (client_id) REFERENCES clients(client_id)
  );
