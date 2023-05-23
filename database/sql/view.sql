CREATE VIEW list_of_students AS
SELECT first_name, last_name
FROM users
WHERE type='student';

SELECT * from list_of_students;