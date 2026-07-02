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
