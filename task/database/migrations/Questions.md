Hello Eng Nahed , Here are 4 problem-solving questions for Laravel SaaS ERP backend candidates:

## Basic Level (1-2)

**1. Database Query Optimization (Basic)**
"A client reports their customer list page is loading slowly. The page shows 50 customers with their latest invoice amounts. You discover the current code is using this approach:

```php
foreach ($customers as $customer) {
    $latestInvoice = $customer->invoices()->latest()->first();
    echo $customer->name . ' - $' . ($latestInvoice ? $latestInvoice->total : 0);
}
```

How would you optimize this to reduce database queries?"

**2. Multi-tenant Data Isolation (Basic)**
"You notice that when User A from Company X logs in, sometimes they can see data from Company Y in their dashboard widgets. The widgets use this query:

```php
$recentOrders = Order::latest()->take(5)->get();
```

What's the issue and how do you fix it across the entire application?"

## Advanced/Spear Level (3-4)

**3. Complex Business Logic Race Condition (Advanced)**
"In your ERP system, when an invoice is paid, three things must happen atomically: (1) Update invoice status, (2) Reduce customer outstanding balance, (3) Create accounting entries. However, during high traffic, you're seeing inconsistent states where invoices are marked as paid but balances aren't updated, or accounting entries are missing. The current code runs these operations sequentially without proper locking. Design a solution that handles concurrent payment processing while maintaining data consistency and performance."

**4. Scalability Architecture Challenge (Spear)**
"Your SaaS ERP now has 500+ tenants, and the largest tenant has 2M+ records. You're experiencing: (1) Slow tenant switching, (2) Database connection pool exhaustion, (3) Some queries timing out, (4) Background jobs backing up during month-end reporting for large tenants. The current architecture uses a single database with tenant_id columns and shared Redis cache. Design a comprehensive solution that addresses all these issues while maintaining backward compatibility and enabling horizontal scaling."

---

## Laravel Practical Tasks

### Task 1: Tenant-Aware Invoice API Endpoint

Create a Laravel API endpoint that handles invoice creation with the following requirements:

```php
// POST /api/invoices
// Request body example:
{
    "customer_id": 123,
    "items": [
        {"product_id": 456, "quantity": 2, "unit_price": 50.00},
        {"product_id": 789, "quantity": 1, "unit_price": 100.00}
    ],
    "due_date": "2025-10-21"
}
```

**Requirements:**

1. **Tenant isolation** - Users can only create invoices for customers in their tenant
2. **Validation** - Validate that products exist and belong to the same tenant
3. **Business logic** - Calculate subtotal, tax (8.5%), and total automatically
4. **Inventory check** - Ensure sufficient product stock before creating invoice
5. **Response format** - Return the complete invoice with line items
6. **Error handling** - Proper error responses for validation failures

**Provide:**

- Controller method
- Request validation class
- Any necessary model relationships
- Database schema for the tables involved

**Bonus:** Add a simple test case that verifies tenant isolation works correctly.

---

### Task 2: Factory Method Pattern - Notification System

**Learning Resource:** Study the Factory Method pattern at https://refactoring.guru/design-patterns/factory-method

**Task:** Build a notification system for the ERP that can send different types of notifications (Email, SMS, Slack, Database) based on user preferences and notification type.

**Requirements:**

1. **Factory Implementation** - Create a NotificationFactory using the Factory Method pattern
2. **Multiple Channels** - Support Email, SMS, Slack, and Database notifications
3. **User Preferences** - Users can set preferred channels for different event types
4. **Event Types** - Handle at least: invoice_created, payment_received, low_stock_alert
5. **Tenant Awareness** - Different tenants can have different default notification channels

**Example Usage:**

```php
// Should automatically determine and send via user's preferred channels
$factory = new NotificationFactory();
$factory->createNotification('invoice_created', $user, $invoice)->send();

// Should send low stock alerts via multiple channels
$factory->createNotification('low_stock_alert', $admin, $product)->send();
```

**Provide:**

1. **Factory class** with createNotification method
2. **Abstract Notification class** and concrete implementations
3. **NotificationPreference model** to store user preferences
4. **Simple service class** that uses the factory
5. **Migration** for notification preferences table

**Bonus:** Add a queue-based delivery mechanism and failed notification retry logic.

---
