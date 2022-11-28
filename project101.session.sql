
--@block Select all users
SELECT * FROM users;


--@block add user
INSERT INTO users(fname, lname , email , student_id, password)
VALUES ('Kiane', 'Alceso', '201910320@mail.com', '201910320', '12345678'), ('Abdul Rauf', 'Sultan', '201910330@mail.com', '201910330', '12345678'), ('Treisha Mae', 'Monteza', '201910340@mail.com', '201910340', '12345678');

--@block Delete
DELETE FROM users WHERE id = "4";


