### 1. Email Validation & Welcome Message
- **File:** `Plugins/mail.php`  
- Validates the user’s email when they sign up.  
- Sends a **welcome email** using PHPMailer.  

**Email message example:**



### 2. Numbered List of Users
- **File:** `users.php`  
- Connects to the **`fol`** database → `users` table.  
- Displays **users in ascending order** by signup ID.  
- Output is shown as a **numbered list**:  


---

### 3. Database Setup
-**username 'root'
-**password 'mosesmugo'
- **Database name:** `fol`  
- **Table:** `users`  

**Schema:**
| Column     | Type        | Attributes                  |
|------------|------------|-----------------------------|
| id         | INT        | Primary Key, AUTO_INCREMENT |
| name       | VARCHAR    | Not Null                    |
| email      | VARCHAR    | Not Null, Unique            |
| created_at | TIMESTAMP  | Default: CURRENT_TIMESTAMP  |

**Sample Data:**
| id | name              | email                            | created_at          |
|----|-------------------|----------------------------------|---------------------|
| 1  | ivan              | Wachiraivan@gmail.com            | 2025-09-10 15:30:07 |
| 2  | moses             | mugomoses506@gmail.com           | 2025-09-10 15:31:16 |
| 8  | michelle wachanga | wachanga.michelle@strathmore.edu | 2025-09-10 15:37:38 |

---

### 4. Git Workflow
- **File:** `git_workflow.txt`  
- Contains the Git steps used for version control:  

