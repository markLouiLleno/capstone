<?php
include("header.php");
?>

<div class="container mt-4">
    <div class="card shadow-sm p-3 mb-5 bg-white rounded">
        <div class="row g-3 align-items-center">
            <!-- Destination Input -->
            <div class="col-md">
                <label for="destination" class="form-label">Enter your destination</label>
                <input type="text" id="destination" class="form-control" placeholder="City, airport, region, landmark, or property name" value="Qingdao Library">
            </div>
            <!-- Check-in and Check-out Inputs -->
            <div class="col-md">
                <div class="row g-3">
                    <div class="col-6">
                        <label for="checkInInput" class="form-label">Check-in</label>
                        <input type="text" id="checkInInput" class="form-control" readonly placeholder="Select date">
                    </div>
                    <div class="col-6 text-end">
                        <label for="checkOutInput" class="form-label">Check-out</label>
                        <input type="text" id="checkOutInput" class="form-control" readonly placeholder="Select date">
                    </div>
                </div>
            </div>
            <!-- Rooms and Guests Input -->
            <div class="col-md">
                <label for="roomsGuests" class="form-label">Guests</label>
                <div class="input-group">
                    <input type="text" id="roomsGuests" class="form-control" readonly value="1 room, 2 adults, 0 children" role="button" data-bs-toggle="modal" data-bs-target="#guestModal">
                    <span class="input-group-text bg-white">
                        <i class="bi bi-chevron-down"></i>
                    </span>
                </div>
            </div>

            <!-- Guest Selection Modal -->
            <div class="modal fade" id="guestModal" tabindex="-1" aria-labelledby="guestModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="guestModalLabel">Select Guests</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="numRooms" class="form-label">Rooms</label>
                                    <input type="number" class="form-control" id="numRooms" value="1" min="1">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="numAdults" class="form-label">Adults</label>
                                    <input type="number" class="form-control" id="numAdults" value="2" min="1">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="numChildren" class="form-label">Children</label>
                                    <input type="number" class="form-control" id="numChildren" value="0" min="0">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="saveGuests">Save</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Check Availability Button -->
            <div class="col-md-auto">
                <button type="button" class="btn btn-primary btn-lg w-100 mt-4">
                    <i class="bi bi-search"></i> Check Availability
                </button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Flatpickr for Check-in and Check-out inputs
        const checkInPicker = flatpickr("#checkInInput", {
            dateFormat: "D, M j",
            minDate: "today",
            onChange: function(selectedDates, dateStr) {
                // Update the minDate for check-out based on the selected check-in date
                flatpickr("#checkOutInput").set('minDate', dateStr);
            }
        });

        flatpickr("#checkOutInput", {
            dateFormat: "D, M j",
            minDate: new Date().fp_incr(1) // Default to tomorrow
        });

        // Handle Save button in the modal
        document.getElementById('saveGuests').addEventListener('click', function() {
            const rooms = document.getElementById('numRooms').value;
            const adults = document.getElementById('numAdults').value;
            const children = document.getElementById('numChildren').value;

            const guestSummary = `${rooms} room${rooms > 1 ? 's' : ''}, ${adults} adult${adults > 1 ? 's' : ''}, ${children} child${children > 1 ? 'ren' : ''}`;
            document.getElementById('roomsGuests').value = guestSummary;

            // Close the modal
            const bootstrapModal = new bootstrap.Modal(document.getElementById('guestModal'));
            bootstrapModal.hide();
        });
    });
</script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>