# Projet Doctolib
Reproduction of part of the functionalities of the Doctolib application as part of a project that validated the lecture "Web Technology" at UTT.

## Introduction
This project aimed to validate our knowledge and skills in web technologies and our understanding of the MVC model presented in class. YThe task was to create a website similar to Doctolib to manage appointments between patients and practitioners using the MVC approach.

## Functionality
### Database
The database is provided in the file doctolib_base.sql and is imported into our MySQL on dev-isi.utt.fr. The tables include:
- Person Table: Contains users (administrators, practitioners, patients) with a status attribute to distinguish them.
- Specialty Table: Contains the specialties of practitioners.
- Appointments Table: Contains the availability of practitioners and appointments taken by patients.

### Menu Bar
The menu bar displays:
- Our names of the students 
- The status of the logged-in user (e.g., administrator)
- The full name of the user (e.g., Paul GAILLARD)
- A menu for the specific functions of the logged-in user
  An innovations menu
  A login menu

## Specifications
### Model
A single person table for all users. ModelPerson class with the constants:
- public const ADMINISTRATOR = 0
- public const PRACTITIONER = 1
- public const PATIENT = 2

### Controllers
- ControllerAdministrator
- ControllerPractitioner
- ControllerPatient

### Administrator Functions
- List Specialties: Display all specialties.
- Select Specialty by ID: Form to select and display a specialty.
- Insert a New Specialty: Form to add a new specialty.
- List Practitioners with Their Specialty: Display practitioners with their specialty.
- Number of Practitioners per Patient: SQL query to get this information.
- Info: Display multiple lists (specialties, practitioners, patients, administrators, appointments).

### Practitioner Functions
- List My Availabilities: Display the practitioner's available appointments.
- Add New Availabilities: Form to add availabilities starting at 10 AM.
- List My Appointments with Patient Names
- List My Patients without Duplicates

### Patient Functions
- My Account: Display the account information.
- List My Appointments: Display the patient's appointments.
- Book an Appointment with a Practitioner: Form to select a practitioner, then an availability.

### Proposed Innovations
- Delete an Availability for a Practitioner

### Login Functions
- Login: Login form. If the user is recognized, their menu is displayed.
- Register: Form to create a new account.
- Logout: Reset the session.
