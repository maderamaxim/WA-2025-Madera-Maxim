CREATE TABLE WA_test (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(50) NOT NULL,
    user_surname VARCHAR(50) NOT NULL,
    user_email VARCHAR(100) NOT NULL UNIQUE,
    user_age INT DEFAULT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
);
INSERT INTO wa_test (user_name, user_surname, user_email, user_age) VALUES 
('Petr', 'Novák', 'petr.novak@seznam.cz',40),
('Dana','Horáková','dana.horakova@seznam.cz',38),
('Jan','Daněk','jan.danek@seznam.cz',21),
('Marie', 'Holanová', 'marie.holanova@gmail.com',29);