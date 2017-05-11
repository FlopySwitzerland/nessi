<?php
/**
 * @var \App\View\AppView $this
 */

$this->assign('title', __('Establishment'));
?>
<div class="row">
    <div class="col s12 m4 l3">
        <div class="card">
            <div class="card-content">
                <p class="m-t-lg flow-text f-s-42"><?= $googledetails['result']['name'] ?></p>
                <p><?= $googledetails['result']['formatted_address'] ?></p>

            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?= __('Reviews') ?></span>
                <?php foreach ($googledetails['result']['reviews'] as $review) { ?>
                    <div class="row">
                        <div class="col s2">
                            <img src="<?= $review['profile_photo_url'] ?>" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                        </div>
                        <div class="col s10">
                            <a class="black-text" href="<?= $review['author_url'] ?>" target="_blank"><?= $review['author_name'] ?></a>
                            <p>
                                <span class="rating-system rating-<?= $review['rating']; ?>"></span>
                                <span class="valign-sup"> - <?= $review['relative_time_description'] ?></span>
                            </p>
                            <p><?= $review['text'] ?></p>
                        </div>
                    </div>
                    <div class="divider"></div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="col s12 m4 l5">
        <div class="card">
            <div class="card-content ">
                <div id="contact-map-canvas">
                    <iframe
                            width="100%"
                            height="100%"
                            frameborder="0" style="border:0"
                            src="https://www.google.com/maps/embed/v1/place?key=<?= GMAPS_API ?>&q=<?= $googledetails['result']['name'] ?>" allowfullscreen>
                    </iframe>
                </div>
            </div>
            <div class="card-content ">
                <span class="card-title">Address</span>
                <?= $googledetails['result']['adr_address'] ?>
                <p><a href="<?= $googledetails['result']['website'] ?>"><i class="material-icons">language</i> Website</a></p>
                <p><a href="tel:<?= $googledetails['result']['international_phone_number'] ?>"><i class="material-icons">phone</i> <?= $googledetails['result']['international_phone_number'] ?></a></p>
            </div>
        </div>
    </div>
    <div class="col s12 m4 l4">
        <div class="card">
            <div class="card-content ">

            </div>
            <div class="card-content ">
                <span class="card-title">Let's keep in touch</span>
                <form class="m-t-md">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="first_name" type="text" class="validate">
                            <label for="first_name">Subject</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="message" class="materialize-textarea"></textarea>
                            <label for="message">Message</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

