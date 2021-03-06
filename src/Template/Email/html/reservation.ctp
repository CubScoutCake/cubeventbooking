<?php
/**
 * @var \App\Model\Entity\EmailSend $emailSend
 * @var \App\Model\Entity\Reservation $entity
 * @var string $token
 */
?>
<h1><?= $emailSend->subject ?></h1>

<p>You are receiving this email because a reservation was added in your name.</p>

<?php if (!$entity->reservation_status->complete) : ?>
    <h3>Your reservation expires on: <strong><?= $this->Time->i18nFormat($entity->expires, 'dd-MMM-yy HH:mm', 'Europe/London') ?></strong></h3>
<?php endif; ?>
<hr />
<p>Use link below to view the current state of your reservation.</p>

<?= $this->Html->link('View Reservation', ['_full' => true, 'controller' => 'Tokens', 'action' => 'validate', 'prefix' => false, $token]) ?>

<hr />

<p>Your user was created at <?= $this->Time->i18nFormat($emailSend->user->created, 'HH:mm', 'Europe/London') ?> on <?= $this->Time->i18nFormat($emailSend->user->created, 'dd-MMM-yy', 'Europe/London') ?>. If this was not you, please email <?= $this->Html->link('info@hertscubs.uk', 'mailto:info@hertscubs.uk') ?>.</p>
<p>We will occasionally contact you from time to time with account notifications (e.g. <span>'your payment has been received'</span>) and with upcoming events. These won't be frequent and you will have the option to unsubscribe.</p>
