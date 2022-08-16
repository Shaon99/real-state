<div class="modal fade" tabindex="-1" id="ask" role="dialog" style="z-index: 99999">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Request Inquiry </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="agent-contact-form-sidebar">
                    <div class="text-center d-none" id="spin">
                        <div class="spinner-border  text-spin"></div>
                    </div>
                    <form action="{{ route('akforprice') }}" method="POST">
                        @csrf
                        <input type="text" id="title" name="title" placeholder="Title" readonly />
                        <input type="text" name="name" placeholder="Full Name" required />
                        <input type="number" name="phone" placeholder="Phone Number" required />
                        <input type="email" name="email" placeholder="Email Address" required />
                        <textarea placeholder="Message" name="message" required></textarea>
                        <input type="submit" id="submit-btn" class="multiple-send-message" value="Submit Request" />
                    </form>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-dark btn-anis ml-0" style="border:none"
                    data-dismiss="modal">{{ __('close') }}</button>
            </div>
        </div>
    </div>
</div>

<script>
    'use strict'
    const spin = document.getElementById("spin");
    const submitBtn = document.getElementById("submit-btn");

    submitBtn.addEventListener("click", function() {
        spin.classList.remove("d-none");
        document.getElementById("form").submit();
    });
</script>
