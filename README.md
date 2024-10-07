#  Family Grocery Inventory System

My mission for this assignment is to construct the core interface and key elements of a family grocery inventory system. This system will enable family members to create a family group, join an existing family, post groceries for other members to purchase, and update the item count after buying or consuming an item.

I will perform the following tasks in this project:
* Form validation in JavaScript
* Design and implement the database.
* Back-end programming in PHP

## Pages and their function

**1. Login Page**

The purpose of this page is to allow a user to enter their username and password to login.

**2. Sign-up Page**

This page should include a form to collect the information required for creating a new account on your grocery inventory system. At the least, it should collect an email address, date of birth, avatar image/graphic, and a password. The form should ask the user to provide their password twice, to ensure that it is entered properly.

**3. Grocery List Page**

This is the default page for the grocery inventory system, showing the groceries posted for a particular family. Each grocery item in the list will have a counter showing how many units that particular grocery item has (5 pieces of tomatoes, 2 boxes of cereals, etc.). Groceries should be ordered by the number of available units (groceries with zero available unit at the top), and then with the most recent first for ties in the number of available units. This will help members to identify the empty groceries quickly. For each grocery in the list, the system should display the following information: grocery title, additional description, the name of the user who posted the grocery and their photo, number of available units, the date and time when the grocery was posted. There should be two buttons with each grocery. The *‘Buy’* button should increase the number of available units and the *‘Consume’* button should decrease the count. There should also be a *delete* button only visible to the user who posted the grocery.

If the unit count of a grocery item is zero, then the *‘Consume’* button should be invisible and the grocery title should be highlighted so that they are easy to identify.

**4. Post Grocery Page**

This page will include a form that can be used to post a new grocery under the current family of the logged-in user. It should allow the user to enter the title of a grocery and the description.

**5. Family page**

The page should have two forms side by side. On one side, there will be a form to create a new family. This form will have only one text input box for inserting the name of the family. On the other side, another form with a dropdown list will allow users to choose a family from the already created families. The user will use this dropdown list to change or join a family.

**All pages should have the name of the currently logged in user and the name of the user's family at the top.**
