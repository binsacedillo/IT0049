# Tasks for Today Management System

A CodeIgniter 4 and MySQL application for viewing today's tasks, the full schedule, one demo profile, and project information. It uses a responsive Tailwind CSS interface with an FEU-inspired palette.

## Technologies and requirements

- PHP 8.2+, CodeIgniter 4, Composer
- MySQL or MariaDB (XAMPP is suitable locally)
- Tailwind CSS 4 CLI and Node.js only when rebuilding CSS
- Apache and Docker for Render deployment

## Local setup

```powershell
cd C:\Users\Vince\Documents\CODEIGNITER\IT0049\TFA1\TSA1_TasksForToday
& "C:\xampp\php\php.exe" "C:\ProgramData\ComposerSetup\bin\composer.phar" install
Copy-Item .env.example .env
```

Start MySQL in XAMPP. Import `database/tasks_for_today.sql` through phpMyAdmin or the MySQL command line, then update `.env` if your local database settings differ.

```powershell
& "C:\xampp\php\php.exe" spark serve --host 127.0.0.1 --port 8080
```

Open `http://127.0.0.1:8080`.

## Tailwind CSS

The compiled `public/css/app.css` is committed, so production does not require Node.js.

```powershell
npm install
npm run css:build
# During styling work:
npm run css:watch
```

## Routes

| Route | Page |
| --- | --- |
| `/` | Today's tasks |
| `/tasks` | Complete task list |
| `/profile` | Demo user profile |
| `/about` | Project and developer information |

## Aiven MySQL

Create `tasks_for_today` in the existing Aiven service and import the SQL export. Do not modify `techfa1_pos`.

Set database values through the ignored local `.env` or Render environment variables. Upload the Aiven CA certificate to Render as `/etc/secrets/ca.pem`, then use these Render-compatible underscore names:

```text
database_default_encrypt={"ssl_ca":"/etc/secrets/ca.pem","ssl_verify":true}
```

Also set `CI_ENVIRONMENT=production`, `app_baseURL`, `database_default_hostname`, `database_default_database=tasks_for_today`, `database_default_username`, `database_default_password`, `database_default_DBDriver=MySQLi`, and `database_default_port`. Never commit credentials, `.env`, or certificates.

## Render deployment

Create a separate Docker Web Service:

- Repository: `binsacedillo/IT0049`
- Branch: `main` after verification and merge
- Root Directory: `TFA1/TSA1_TasksForToday`
- Dockerfile Path: `./Dockerfile`
- Health Check Path: `/`

No custom build or start command is required. The container serves `public/` on port `10000`.

## Verification

```powershell
& "C:\xampp\php\php.exe" spark routes
& "C:\xampp\php\php.exe" vendor\bin\phpunit
& "C:\xampp\php\php.exe" "C:\ProgramData\ComposerSetup\bin\composer.phar" validate
```

Repository: <https://github.com/binsacedillo/IT0049>

Hosted application: add the Render URL after deployment.
