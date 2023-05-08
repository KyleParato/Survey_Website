# Survey_Website
Survey



Client Business Requirements:
Your customer is called Magic Survey, a well-known company for online surveys and marketing. Your
team will design a database for their online survey web application. The database stores all the
information related to surveys, users, and responses.
1. Anyone can take an active survey if they have the survey link.
2. An active survey means it is not closed or canceled by the user or not after the deadline.
3. All users must sign up with a unique email and strong password before creating surveys.
4. Password must have at least eight characters long, one upper case, one lower case, one
number, and one special character.
5. The users must provide a first name, last name, email, and phone number.
6. The users can look up the surveys by name or code.
7. The users can remove or delete the surveys from their list, but the data is kept in the database.
8. The users can view all the surveys and responses.
9. The users can cancel or close the survey at any time.
10. Each survey must have a code, name, description, start date-time, and end date-time.
11. One survey must have a minimum of five questions.
12. The users can arrange questions in a survey in any order.
13. Each question must have a name, description, and type.
14. Question type:
o Multiple answers: Respondents can choose more than one answer from the available
options.
o Multiple choice: Respondents can choose only one answer from the available options.
o Yes/No: Respondents can either choose yes or no.
o Essay: Respondents can enter anything into the answer textbox.
15. Some question types, such as multiple answers and multiple-choice, have a list of answer
options so the respondents can select only the options from the list.
16. Respondents can be anonymous or registered users.
17. All tables must have a timestamp to know when the record is inserted.
Additional Submission Requirements for the Project
1. Provide a SQL script to create a database called “survey” in MySQL server. Ensure your script can
create the database and all the tables without an issue.
2. Create a VIEW with the first name, last name, email, and phone number of all users who create
more than ten surveys.
3. Create a VIEW showing all the surveys with more than ten responses.
4. Create a VIEW showing all the surveys with more than ten questions.
5. Create a VIEW showing all the removed or deleted survey
