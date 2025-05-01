# 📨 Internal Package Tracker - Command Injection (Easy)

Welcome to **Internal Package Tracker**, a tool used by the logistics department to ping internal delivery nodes and track routing status across warehouse branches.

However... 👀 our sysadmin recently pushed a quick update without code review. Can you use the functionality provided to uncover the hidden delivery reference?

---

## 📦 Scenario

You're provided access to a **web-based tracking system** hosted at:

http://[your-ip]:8010


The app asks you to input an IP address to ping an internal delivery node — but maybe there's a way to do more than just ping 👀

Your goal is to uncover the **flag hidden inside the system**.

---

## 🎯 Objective

Extract the flag:
AKCTF25{...}

using only the input field on the web interface.

---

## 🧠 Hints (Reveal as needed)

<details>
  <summary>Hint 1 💡</summary>
  The app runs your input as part of a system command. Ever used a semicolon in a terminal before?
</details>

<details>
  <summary>Hint 2 💡</summary>
  Try chaining commands. For example: `127.0.0.1; whoami`
</details>

<details>
  <summary>Hint 3 💡</summary>
  The flag might be hidden where Linux stores user info. Maybe a file called `/etc/passwd`?
</details>

---

## ✅ Solves

- Command Injection
- Linux file traversal
- Real-world logic chaining

---

## 🛠 Author Notes

- Built with PHP & Apache inside Docker
- Intended for beginner-level CTF training
- Default port: `8010`

---

Good luck, and happy tracking 📦🚚


