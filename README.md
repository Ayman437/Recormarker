# Recormarker
A comprehensive local platform for recording student attendance in every class within a school. The platform enables supervisors to accurately monitor each student's attendance, manage and update school data, generate detailed reports, analyze attendance statistics with ease, and print records or retrieve information at any time.

## Project's Story
Back when I was 15 years old, I was in my first year of high school. At that time, a competition was launched that included several different categories, one of which was web application development. The challenge was to create a useful web application with an innovative idea, present it to the judges, and compete for the best project.

I came up with the idea of developing a web application that would help schools manage student attendance. The system would allow every teacher to record attendance using the classroom's smart screen, their smartphone, or a computer. Once submitted, the attendance report would be sent directly to the school's central attendance database. The attendance supervisor could then access all attendance records from a central administration computer.

Each teacher would have their own secure account protected by a username and password, ensuring that only authorized users could access the system. This would enable the school to manage attendance more efficiently, save time, and analyze attendance data with ease.

My school already had a local network that connected every classroom's smart screens, so I thought it would be the perfect environment to host the entire web application.

The competition had just been announced, and participants had only one week to complete and submit their projects. I went to the competition organizer to confirm the submission requirements. They explained that once I finished the project, I needed to submit it on a CD along with comprehensive documentation, screenshots, and demonstration videos.

I worked incredibly hard throughout that week to complete the entire project before the deadline. After many long days of development, I finally finished everything. I prepared the CD, signed the participation form, and submitted my project to the organizer.

After that, I waited for the competition results. One week passed, then another, but nothing was announced. Surprisingly, even after waiting for more than a month, there was still no news. To this day, I have never learned what happened to that competition. It was as if it had simply disappeared without a trace.

Although I was disappointed, I eventually realized that the experience itself was far more valuable than the competition. Even if nothing came from it, I had successfully designed and built a complete and fairly complex software project on my own. Throughout the process, I learned a tremendous amount about software development, problem-solving, and perseverance. Looking back, I consider that project one of the most important milestones in my programming journey.

## Architecture

```
Recormarker English/
├── account/
│   ├── absstudents.php            # Student attendance records
│   └── teacher.php                # Teacher dashboard
│
├── css/                           # Stylesheets
│   ├── absences.css
│   ├── admin.css
│   ├── adminlogin.css
│   ├── error.css
│   ├── index.css
│   ├── takeabsence.css
│   ├── teacheraccount.css
│   └── teacherlogin.css
│
├── inc-sdnfgDKS3JIah3HU.php       # Configuration files
│   ├── conn-kjfLJG5ysdbi4.php     # Database connection
│   └── sec-jLJgdh48.php           # Security functions / Encrypting & Decrypting
│
├── js/                            # Client-side JavaScript
│   ├── admin.js
│   ├── chooseclass.js
│   └── takeabsence.js
│
├── login/
│   ├── admin.php                  # Supervisor login
│   └── teacher.php                # Teacher login
│
├── svg/                           # SVG graphics
│   ├── 404.svg
│   └── error.svg
│
├── .htaccess                      # URL rewriting and server configuration
├── 404.php                        # Custom 404 page
├── about.php                      # About page
├── error.php                      # Error page
├── index.php                      # Home page
└── win4.sql                       # MySQL database schema
```

## Setup & Usage

### Setting Up the PHP Web Application
This project is a PHP web application and requires an Apache web server with PHP support.

### Requirements
- PHP.
- Apache HTTP Server (or a package such as XAMPP, WAMP, or Laragon).
- MySQL database.

### Installation
- To run the web application locally on your machine you need to install an Apache server with PHP support (e.g., XAMPP, WAMP, or Laragon).
- Copy or clone the project into the web server's document root (for example, htdocs in XAMPP or www in WAMP).
- Import the provided SQL database into your MySQL server.
- Configure the database connection by editing the project's configuration file (if required).
- Start the Apache and MySQL services.

- Open your web browser and navigate to:

- `http://localhost/<project-folder>/` or `http://localhost:<PORT>/<project-folder>/` (if using a custom port number).

- Replace <project-folder> with the name of the project's directory and <PORT> with your Apache server port.

### Notes
- Ensure that both Apache and MySQL are running before accessing the web application.
- If you are accessing the web application from another device on the same local network, replace localhost with the server computer's local IP address. For example:

- `http://192.168.1.7/<project-folder>/`

### Usage
After accessing the web application, in the home page you can choose between logging in as a teacher or a supervisor, let's say you chose to log in as a supervisor, if this is your first time accessing the web application and did not edit the accounts information in the database, then there is default accounts in the database you can log in using them for the first time. 

The following default accounts are available for first-time access to the web application:

### Default Supervisor Accounts

| Username | Password |
|----------|----------|
| admin2 | admin2 |
| root4 | root4 |

### Default Teacher Accounts

| Username | Password |
|----------|----------|
| alexMark12 | 12345678 |
| MaxWell13 | xMaHIgrE |

<p align="center">
<img width="960" height="370" alt="first page" src="https://github.com/user-attachments/assets/b3585faf-77c4-4e0d-90a9-095fc74d0595" />

<img width="960" height="250" alt="admin login" src="https://github.com/user-attachments/assets/39385d14-ad3d-424b-afa7-66b9e1e7c61d" />
</p>

After logging in as a supervisor, you get full access to the management dashboard, if you log in as a teacher you get access to your account and you can record your class's attendance. 

## Screenshots
<p align="center">
<img width="960" height="412" alt="dashboard1" src="https://github.com/user-attachments/assets/2a1b1487-8a48-4240-a54a-5306ebff7cc4" />

<img width="960" height="441" alt="dashboard2" src="https://github.com/user-attachments/assets/8ad30b5a-ef4b-4789-b33b-dbae0391d342" />

<img width="960" height="304" alt="dashboard 3" src="https://github.com/user-attachments/assets/bcb4bdd0-70df-4b7a-9edd-13658b1d0aaa" />

<img width="960" height="272" alt="dashboard4" src="https://github.com/user-attachments/assets/433fd30d-820f-4bfc-b2c4-9a756c95af12" />

<img width="960" height="473" alt="dashboard5" src="https://github.com/user-attachments/assets/2b593d15-7511-4389-b665-51aa2b64ca1a" />

<img width="960" height="473" alt="dashborad6" src="https://github.com/user-attachments/assets/d3fdf7da-366f-44dd-b72f-e8d44842b4fb" />

<img width="960" height="475" alt="dashboard7" src="https://github.com/user-attachments/assets/23fd9d36-47e1-4f21-a189-e98abf781a25" />

<img width="655" height="433" alt="dashboard8" src="https://github.com/user-attachments/assets/84daaec9-0b71-4571-b3a5-570c3d91f4c8" />

<img width="960" height="472" alt="dashboard9" src="https://github.com/user-attachments/assets/686fb0ca-1719-42fd-bf21-0558eb1d4cf9" />

<img width="960" height="427" alt="dashboard10" src="https://github.com/user-attachments/assets/75998c41-0d50-491b-9164-995f4ecaf7d2" />

<img width="960" height="453" alt="dashboard11" src="https://github.com/user-attachments/assets/d506b94a-d9ab-447b-9eda-759ba0a9de7b" />

<img width="960" height="489" alt="dashboard 11" src="https://github.com/user-attachments/assets/e0397d9a-fb05-4d67-94b8-8a28f1b3bce7" />

<img width="532" height="76" alt="dashboard12" src="https://github.com/user-attachments/assets/1fa64439-baa7-446a-92b3-8bce5cf71672" />
</p>
<p align="center">Database structure</p>
<p align="center"><img width="730" height="481" alt="database" src="https://github.com/user-attachments/assets/4a1193f1-5514-4424-ad79-dcaf57acc95e" /></p>

## Thanks for Visiting
You've reached the end of the README!

Thank you for taking the time to explore this project. I hope you enjoyed it, and I wish you success with your own projects.

Happy coding! 🚀
