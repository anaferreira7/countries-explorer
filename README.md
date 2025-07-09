# 🌍 Frontend Challenge - Inertia Countries Explorer

Welcome!

This challenge is designed to evaluate your skills with **Laravel**, **Inertia.js**, and **Vue 3** in building a single-page application.

---

## 🎯 Goal

Build a small SPA that fetches a list of countries from the [REST Countries API](https://restcountries.com/v3.1/all) and displays the information on two distinct pages using Inertia.js:

-   `/countries/table` – Table view
-   `/countries/cards` – Card grid view

---

## 🛠️ Tech Requirements

You must use:

-   Laravel as the backend (no database required)
-   Inertia.js (with Vue 3)
-   REST Countries API as your only data source: `https://restcountries.com/v3.1/all`

---

## 📄 Page 1: Country Table View (`/countries/table`)

Display a list of countries in a **paginated HTML table**:

-   Columns:
    -   Country Name
    -   Capital
    -   Region
    -   Population
    -   Flag (image)
-   Add a **search box** to filter countries by name (client-side)
-   Optional: Add sorting by name or population

---

## 🃏 Page 2: Country Card View (`/countries/cards`)

Show the same country list in a **grid of cards** with an infinite scroll:

-   Each card should display:
    -   Flag
    -   Country name
    -   Region
    -   Population

---

## 🔄 Navigation

-   Use Inertia’s `<Link>` to navigate between the two pages (SPA behavior)
-   Implement a shared layout with a header and navigation bar

---

## 🧪 Bonus Features (Optional)

-   Additional filters such as by region or population size
-   Use Typescript
-   Responsive layout

---

## ✅ Evaluation Criteria

| Area                | Focus                                         |
| ------------------- | --------------------------------------------- |
| Inertia Proficiency | `Inertia::render`, `<Link>`, `useForm`, props |
| SPA Navigation      | Smooth transitions, no full reloads           |
| UI/UX               | Clean design, responsive layout               |
| Code Quality        | Organization, naming, reusability             |
| Bonus (Optional)    | Filtering, detail page, caching, pagination   |

---

## ⏱️ Time Expectations

-   Please submit within **72 hours** of starting

---

## 📦 Submission

1. Create a **private GitHub repository**
2. Add this README with any additional notes
3. Include setup instructions
4. Send us the repo link when ready 🚀

---

## 🚀 Getting Started

### 1. Clone the repository

```bash
git clone https://github.com/your-username/your-repo.git
cd your-repo
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Install JavaScript dependencies

```bash
npm install
```

### 4. Set up environment variables

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Run development servers

```bash
php artisan serve
npm run dev
```

Visit: [http://localhost:8000](http://localhost:8000)

> ✅ Laravel runs on port 8000  
> ✅ Vite runs in the background (port 5173)

---

## 📄 License

This project is open-sourced under the [MIT license](LICENSE).
