# Computer-Science-3319

A repository of the assignments completed as part of the CS 3319 course at the University of Western Ontario. Following is a short description of each assignment. 

## Assignment 2
Practice writing MySQL queries using a database setup script created by the professor. Following are the descriptions for queries made for the assignment:
<br>
<br>

### Part 1. SQL Updates 

Write the command to show all the data in the hospital table BEFORE you modify it.
<br>
Write the updates to make Dr. Shabado the head of of St. Joseph hospital (became head on December 19, 2010), Dr. Aziz the head of Victoria Hospital in London, Ontario (became head on May 30, 2004) and Dr. Spock the head of Victoria Hospital in Victoria (became head on June 1, 2001). 
<br>
Write the command to show all the data in the hospital table AFTER you have modified it to prove that it worked.

### Part 2. SQL Inserts
Insert a doctor of your choice who works at Victoria Hospital in London Ontario.
<br>
Insert a patient whose name is your favourite actor or actress.  
<br>
Insert the data that will show that your new doctor treats your new patient.
<br>
Insert a new hospital somewhere in Canada and have your new doctor be the head of your new hospital and they started sometime this month.
<br>
Write 4 statements that show all the data in the 4 tables to prove that your new rows were added.

### Part 3. SQL Queries

1. Show the last names of all the patients
2. Show the last names of all the patients with no repeats
3. Show all the data in the Doctor table, but show them in order of their last names from A to Z
4. Show the name  and id of all hospitals that have over 1500 beds
5. List the first name and last name of all the doctors who work at St. Joseph Hospital (use the name as the look up not the key)
6. List the first name and last name of all patients whose last name begins with a "G"
7. List the first name and last name of all patients who are treated by a doctor with the last name of Webster (use the name as the look up not the key)
8. List the hospital name, city and the last name of the head doctor of all the hospitals.
9. Find the total number of beds for all the hospitals
10. List the first names and last name of the patient and the first name and last name of the doctor for all patients treated by a head doctor
11. Find all the surgeons (last name and first name) who work at a hospital called Victoria. Also list the hospital's province for each surgeon.
12. Find the first name of all doctors who don't treat anyone.
13. Find all doctors (last name and first name and number of patients they treat and the name of the hospital they work at) who treat MORE than one patient (HInt: you will have to use the key words Group By and Having)
14. Find any doctor (first name and last name) who are the head of a hospital but work at a different hospital. Include both hospital names as well and write the query so that the titles of the columns are "Doctor First Name"  "Doctor Last Name" "Head of Hospital Name" "Works at Hospital Name" (NOTE: if you want, you could break this one in steps using views, but keep them all together under -- Query 14)
15. Think of your own query that might be useful for someone interested in Canadian Healthcare. Include a comment to say what query it answers and then put the actual  SQL command to answer that query.

## Assignment 3
A website created as part of the CS 3319A Intro to Databases course at Western University. Objective: to connect a webpage to a backend database using PHP and MySQL, capable of making queries, updates, insertions, and deletions. The database used for the connection was the same as that of Assignment 2
<br>
Note that the emphasis was on the backend connection and not the user interface and experience. Unfortunately, due to time constraints, I could only apply some basic styling to the project, and bugs regarding the interface are likely present.
