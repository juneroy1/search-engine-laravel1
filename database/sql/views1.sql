CREATE VIEW view_students_user_data AS

SELECT 
 *
FROM users
WHERE type= 'student';
