<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Form project</title>
</head>
<body class="container">   
<form class="row g-3" action="#" method="POST">
    <div class="row g-3">
  <div class="col">
    <label for="First_name" class="form-label">First name</label>
    <input type="text" class="form-control" name="first_name" placeholder="First name" id="First_name" aria-label="First name">
  </div>
  <div class="col">
    <label for="inputEmail4" class="form-label">Last name</label>
    <input type="text" class="form-control" name="Last_name" placeholder="Last name" id="Last_name" aria-label="Last name">
  </div>
</div>
    <div class="col-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" class="form-control" name="address" id="inputAddress" placeholder="1234 Main St">
  </div>
    
  <div class="col-md-6">
    <label for="inputCity" class="form-label">City</label>
    <input type="text" class="form-control" name="city" id="inputCity">
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">State</label>
    <select id="inputState" name="state" class="form-select">
        <option>Arizona</option>
        <option>Colorodo</option>
      <option selected>Michigan</option>
      <option>New York</option>
      <option>Ohio</option>
    </select>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Zip</label>
    <input type="text" class="form-control" name="zip" id="inputZip">
  </div>
  <div class="col-md-6">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" class="form-control" name="phone" id="phone">
  </div>
    <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" id="inputEmail4">
  </div>
  <div class="col-12">
  <label class="form-label">Preferred method of contact:</label>
  <br>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="preferred_contact" id="preferred1" value="email">
  <label class="form-check-label" for="preferred1">Email</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="preferred_contact" id="preferred2" value="text">
  <label class="form-check-label" for="preferred2">Text</label>
</div>
</div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
</form>
<!--
1. What are the accessibility element or elements you added you must name and show them in your code.

2. What do the accessibility elements do.

3. Explain why the radio buttons for "Preferred method of contact" all share the same name attribute value. 
    What would happen if they had different name values?

4. What is the purpose of the `for` attribute on the label elements, 
    and how does it relate to the `id` attribute on the input elements? What happens if this relationship is broken?
    
5. In the select dropdown for State, one option has the `selected` attribute. 
    Explain what this does and why it's useful for user experience.
-->
</body>
</html>