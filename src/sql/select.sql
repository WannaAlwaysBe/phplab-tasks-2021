use teacher_schedule;

# DISTINCT
SELECT DISTINCT subject FROM schedule;

# WHERE
SELECT * 
FROM schedule
WHERE lesson BETWEEN 3 AND 6;

SELECT subject 
FROM schedule 
WHERE subject LIKE 'S%';

# ORDER BY
SELECT *
FROM schedule
ORDER BY day;

SELECT first_name, last_name
FROM teachers
ORDER BY last_name DESC;

# LIMIT
SELECT * 
FROM schedule
LIMIT 4;

SELECT * 
FROM schedule
LIMIT 4, 4;

# JOINS
SELECT subject, last_name
FROM schedule
LEFT JOIN teachers ON teachers.id = schedule.teacher_id;

SELECT subject, last_name
FROM schedule
RIGHT JOIN teachers ON teachers.id = schedule.teacher_id;

# AGGREGATE FUNCTIONS 
SELECT COUNT(subject) AS subject_count
FROM schedule;

# GROUP BY
SELECT subject, COUNT(day) AS summary_days
FROM schedule
GROUP BY subject;

# HAVING
SELECT subject, COUNT(day) AS summary_days
FROM schedule
GROUP BY subject
HAVING COUNT(day) > 2;

# Subqueries
SELECT *
FROM teachers
WHERE id IN (SELECT teacher_id
	FROM schedule
    WHERE subject LIKE 'S%');

#Views
CREATE VIEW most_used_subject_view AS
SELECT subject, COUNT(day) AS summary_days
	FROM schedule
	GROUP BY subject
	HAVING COUNT(day) > 2
    ORDER BY subject
    LIMIT 1;
    
SELECT subject 
FROM most_used_subject_view;
