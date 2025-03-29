import './bootstrap';
// Values should be dark, light, or system
var theme_options = ["dark", "light", "system"];

// Set the initial state on page load
if (
    localStorage.getItem("theme") === "system" &&
    getSystemThemeMode() === "dark"
) {
    document.documentElement.classList.add("dark");
} else if (localStorage.getItem("theme") === "dark") {
    document.documentElement.classList.add("dark");
} else {
    document.documentElement.classList.remove("dark");
}

// Get the user's system theme mode
function getSystemThemeMode() {
    return window.matchMedia("(prefers-color-scheme: dark)") ? "dark" : "light";
}

// Set the theme to user's system theme mode
function setToSystemThemeMode() {
    let theme = getSystemThemeMode();

    if (theme === "dark") {
        document.documentElement.classList.add("dark");
    } else {
        document.documentElement.classList.remove("dark");
    }

    localStorage.setItem("theme", "system");
}

// Toggle theme mode
function toggleDarkMode() {
    let isDark = document.documentElement.classList.toggle("dark");
    let theme = isDark ? "dark" : "light";
    localStorage.setItem("theme", theme);
}

// Set theme mode
function setThemeMode(theme) {
    if (theme_options.includes(theme)) {
        localStorage.setItem("theme", theme);

        if (theme === "dark") {
            document.documentElement.classList.add("dark");
        } else {
            document.documentElement.classList.remove("dark");
        }
    }
}

document.addEventListener("toggleDarkModeEvent", (e) => {
    toggleDarkMode();
});

document.addEventListener("setThemeModeEvent", (e) => {
    let theme = e.detail.theme;
    if (theme != null) {
        setThemeMode(theme);
    }
});

document.addEventListener("setToSystemThemeModeEvent", (e) => {
    setToSystemThemeMode();
});