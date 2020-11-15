<div class="modal fade" id="contact-modal" tabindex="-1" role="dialog" aria-labelledby="contact-modal"
      aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Contactez-moi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mx-3">
            <form name="contact" method="POST" class="form" action="/form/validate.php" id="contact-form">
                <div class="mb-5">
                    <div class="d-flex align-items-center md-form">
                        <label class="d-none" for="name">Votre Nom</label>
                        <i class="fas fa-user prefix contact-icons"></i>
                        <input name="name" type="text" class="form-control validate" placeholder="Votre Nom" value="<?php if ( ! empty( $_POST['name'] ) ) echo $_POST['name']; ?>" autofocus required>
                    </div>
                </div>

                <div class="mb-5">
                    <div class="d-flex align-items-center md-form">
                        <label class="d-none" for="email">Votre Email</label>
                        <i class="fas fa-envelope prefix contact-icons"></i>
                        <input name="email" type="email" class="form-control validate" id="email" placeholder="Votre Email" value="<?php if ( ! empty( $_POST['email'] ) ) echo $_POST['email']; ?>" required>
                    </div>
                </div>

                <div class="mb-5">
                    <div class="d-flex align-items-center md-form">
                        <label class="d-none" for="subject">Sujet</label>
                        <i class="fas fa-tag prefix contact-icons"></i>
                        <input name="subject" type="text" class="form-control validate" placeholder="Sujet" value="<?php if ( ! empty( $_POST['subject'] ) ) echo $_POST['subject']; ?>" required>
                    </div>
                </div>

                <div class="mb-5">
                    <div class="d-flex align-items-center md-form">
                        <label class="d-none" for="message">Votre message</label>
                        <i class="fas fa-envelope prefix contact-icons"></i>
                        <textarea name="message" type="text" class="md-textarea form-control" rows="4" placeholder="Votre message" value="<?php if ( ! empty( $_POST['message'] ) ) echo $_POST['message']; ?>" required></textarea>
                    </div>
                </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                <button name="submit" class="btn btn-lg btn-primary btn-block d-flex justify-content-center align-items-center inner-button" id="send-btn" type="submit">ENVOYER</button>
            </form>
        </div>
    </div>
    </div>
</div>