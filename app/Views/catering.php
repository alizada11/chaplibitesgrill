<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<main class="container py-5 main">
 <div class="text-center mb-5">
  <h1 class="display-5 fw-bold">Catering</h1>
  <p class="lead">Delicious food for every event</p>
 </div>

 <div class="row mb-5 catering-header">
  <div class="col-md-6">

   <img src="<?= base_url('uploads/home/home-banner.png') ?>" class="img-fluid mb-3" alt="Service 2">
  </div>
  <div class="col-md-6">
   <h2>Perfect for Any Occasion</h2>
   <p>Our catering service is ideal for corporate events, weddings, birthdays, and more. Choose from a wide variety of menu options tailored to your needs.</p>
   <ul>
    <li>Corporate Events</li>
    <li>Birthday Parties</li>
    <li>Weddings & Receptions</li>
    <li>Family Gatherings</li>
   </ul>
  </div>
 </div>

 <div class=" p-4 rounded shadow mb-5">
  <h3 class="mb-3">Request Catering Info</h3>
  <form method="post" name="Catering" action="<?= base_url('contact') ?>">
   <input type="hidden" name="post_id" value="181">
   <input type="hidden" name="form_id" value="84e8db4">
   <input type="hidden" name="referer_title" value="Catering">
   <input type="hidden" name="queried_id" value="181">

   <div class="container">
    <div class="mb-3">
     <label class="form-label">Who's Paying for this Event?</label>
     <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="form_fields[field_0481d52]" id="paying-host" value="Host">
      <label class="form-check-label" for="paying-host">Host</label>
     </div>
     <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="form_fields[field_0481d52]" id="paying-guests" value="Guests">
      <label class="form-check-label" for="paying-guests">Guests</label>
     </div>
    </div>

    <div class="row">
     <div class="col-md-6 mb-3">
      <label for="form-field-name" class="form-label">Name</label>
      <input type="text" name="form_fields[name]" id="form-field-name" class="form-control" placeholder="Enter Your Full Name">
     </div>
     <div class="col-md-6 mb-3">
      <label for="form-field-phone" class="form-label">Phone</label>
      <input type="tel" name="form_fields[field_5b4e5a3]" id="form-field-phone" class="form-control" placeholder="Enter Your Phone" pattern="[0-9()#&amp;+*-=.]+" title="Only numbers and phone characters are accepted.">
     </div>
    </div>

    <div class="mb-3">
     <label for="form-field-email" class="form-label">Email</label>
     <input type="email" name="form_fields[email]" id="form-field-email" class="form-control" placeholder="Enter Your Email" required>
    </div>

    <div class="row">
     <div class="col-md-3 mb-3">
      <label for="form-field-zip" class="form-label">Event Location</label>
      <input type="text" name="form_fields[field_e7ad60d]" id="form-field-zip" class="form-control" placeholder="Enter the Zipcode Only">
     </div>
     <div class="col-md-3 mb-3">
      <label for="form-field-date" class="form-label">Event Date</label>
      <input type="date" name="form_fields[field_2b9c06b]" id="form-field-date" class="form-control" placeholder="What is the Event Date">
     </div>
     <div class="col-md-3 mb-3">
      <label for="form-field-start-time" class="form-label">Start Time</label>
      <input type="date" name="form_fields[field_af422c5]" id="form-field-start-time" class="form-control" placeholder="What is the Start Time">
     </div>
     <div class="col-md-3 mb-3">
      <label for="form-field-end-time" class="form-label">End Time</label>
      <input type="date" name="form_fields[field_c995275]" id="form-field-end-time" class="form-control" placeholder="What is the End Time">
     </div>
    </div>

    <div class="row">
     <div class="col-md-4 mb-3">
      <label for="form-field-guests" class="form-label">Guests</label>
      <input type="number" name="form_fields[field_f24e540]" id="form-field-guests" class="form-control" placeholder="Number of Guests" min="1">
     </div>
     <div class="col-md-4 mb-3">
      <label for="form-field-service" class="form-label">Service Needed</label>
      <select name="form_fields[field_8edcdbc]" id="form-field-service" class="form-select">
       <option value="">Please select the service</option>
       <option value="Food Truck">Food Truck</option>
       <option value="Buffet Service">Buffet Service</option>
       <option value="Drop Off">Drop Off</option>
       <option value="Other">Other</option>
      </select>
     </div>
     <div class="col-md-4 mb-3">
      <label for="form-field-budget" class="form-label">Ideal Budget (Price/Person)</label>
      <select name="form_fields[field_99130e4]" id="form-field-budget" class="form-select">
       <option value="">Please select the budget</option>
       <option value="$8 - $10/ Person">$8 - $10/ Person</option>
       <option value="$10 - $12/ Person">$10 - $12/ Person</option>
       <option value="$12- $15/ Person">$12- $15/ Person</option>
       <option value="$15-$20/ Person">$15-$20/ Person</option>
       <option value="$20 &amp; up/ Person">$20 &amp; up/ Person</option>
      </select>
     </div>
    </div>

    <div class="mb-3">
     <label for="form-field-additional" class="form-label">Additional Information</label>
     <textarea name="form_fields[field_d461b6c]" id="form-field-additional" rows="4" class="form-control" placeholder="Please enter any Specific Details/Requests"></textarea>
    </div>

    <!-- Google reCAPTCHA would go here if needed -->
    <!-- You can add reCAPTCHA integration via JS or Google’s API -->

    <div class="text-end">
     <button type="submit" class="btn btn-primary">Send</button>
    </div>
   </div>
  </form>

 </div>
</main>
<?= $this->endSection() ?>