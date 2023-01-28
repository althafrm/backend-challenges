CREATE TABLE companies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    FOREIGN KEY (company_id) REFERENCES companies(id)
);

CREATE TABLE assets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    FOREIGN KEY (company_id) REFERENCES companies(id)
);

CREATE TABLE managers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    FOREIGN KEY (company_id) REFERENCES companies(id)
);

CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    FOREIGN KEY (company_id) REFERENCES companies(id)
);

CREATE TABLE people (
    id INT AUTO_INCREMENT PRIMARY KEY,
    manager_id INT,
    employee_id INT,
    name VARCHAR(255) NOT NULL,
    FOREIGN KEY (manager_id) REFERENCES managers(id),
    FOREIGN KEY (employee_id) REFERENCES employees(id)
);

CREATE TABLE company_sub_groups (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE company_groups (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company_id INT NOT NULL,
    employee_id INT NOT NULL,
    sub_group_id INT NOT NULL,
    FOREIGN KEY (company_id) REFERENCES companies(id),
    FOREIGN KEY (employee_id) REFERENCES employees(id),
    FOREIGN KEY (sub_group_id) REFERENCES company_sub_groups(id)
);

CREATE TABLE company_group_heads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    group_id INT NOT NULL,
    employee_id INT NOT NULL,
    FOREIGN KEY (group_id) REFERENCES company_groups(id),
    FOREIGN KEY (employee_id) REFERENCES employees(id)
);