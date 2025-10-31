# Nex Digital / Goodcommerce

## 🛠️ Approach & Implementation

### Time Allocation
Total time spent: **4 hours**.

### Implementation Details
The solution follows standard Laravel conventions, focusing on **Separation of Concerns (SoC)** and **Inversion of Control (IoC)** to ensure maintainability and testability.

* **Database Schema:** A `posts` table was created with key fields: `title`, `content`, `status` (`draft`/`published`), `source`, and `external_id`.
* **Data Layer:** An **Eloquent Model (`Post`)** was used to manage database interactions.
* **Presentation Layer:** Standard Blade **views** were created for listing, showing, and updating individual posts.
* **Controller & Routing:** A **`PostController`** handles all necessary actions, including: `index`, `show`, `edit`, `update`, `destroy`, and the custom `import` functionality.
* **API Integration (Service Pattern):**
    * An **`ImportPostInterface`** defines the contract for all external data sources, requiring the methods: `import()`, `getRandomId()`, and `getMaxItem()`.
    * **Concrete Services** were implemented for each API: `JsonPlaceHolderService` and `FakeStoreService`.
* **Dependency Resolution (IoC):**
    * The **`ImportServiceProvider`** uses Laravel's Service Container and **Contextual Binding** to resolve the correct API service.
    * It determines which concrete class to inject based on a `type` variable passed in the request when the import feature is called.
    * This design simplifies future enhancements, requiring only the addition of a new service class and a new binding association in the provider.
* **Data Integrity:** The import logic prevents duplication by checking the combined **`source`** and **`external_id`** fields before insertion. The `getRandomId()` method ensures only non-existent external IDs are targeted for import.

### Future Improvements
* Apply **unit and feature tests** to guarantee code quality and stability.
* Improve the **layout and styling** for better user usability and interface design.




## Fullstack Developer Test

### Blog Platform with Content Importer

---

## **Objective**

Build a simple blog platform that can import content from external APIs.  
Show us your approach to API integration and data transformation.

## **Time Estimate**

This task should not take more than 4 hours.

---

## **Requirements**

### **Blog Features**

- Blog posts with: `title`, `content`, `status` (draft/published), `source`, `external_id`
- Admin panel to manage posts
- Public page to view published posts

### **Import Functionality**

- Import from **JSONPlaceholder API** — random blog post
- Import from **FakeStore API** — random product (transform to blog post)
- Single item import per execution
- Duplicate prevention
- Imported posts saved as drafts

### **APIs**

- **JSONPlaceholder**: `https://jsonplaceholder.typicode.com/posts/{randomId}`
- **FakeStore API**: `https://fakestoreapi.com/products/{randomId}`

---

## **The Challenge**

Transform two different data structures into consistent blog posts.

### **JSONPlaceholder Post Example**

```json
{
  "id": 1,
  "title": "blog post title", 
  "body": "blog post content"
}
```

### **FakeStore Product Example**

```json
{
  "id": 1,
  "title": "Product Name",
  "description": "Product description",
  "price": 109.95,
  "category": "product category"
}
```

Both should be transformed into blog posts in your system.

---

## **Setup**

```bash
git clone [repository]
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

---

## **Submission**

## Submission Instructions

1. Use this repository template
2. Build your solution
3. Commit with meaningful messages
4. Submit your repository URL for us to review
5. Include in your submission:
    - Total time spent
    - Explain your approach
    - Explain how you would add a new API Source
    - Propose improvement to your own code

---

## **Evaluation Focus**

- Problem-solving approach
- Code quality and structure
- User experience
- Commit history

Show us how you think.

---

## **Closing Note**

We look forward to reviewing your solution and seeing how you approach real-world API integration challenges.
