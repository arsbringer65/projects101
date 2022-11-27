
--@block Select all users
SELECT * FROM users;


--@block add user
INSERT INTO users(fname, lname , email , student_id, password)
VALUES ('Abdul Rauf', 'Sultan', '201910399', 'abdulrauf@mail.com', '12345678');

--@block Delete
DELETE FROM users WHERE id = "1";
