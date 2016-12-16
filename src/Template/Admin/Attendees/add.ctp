<div class="attendees form large-10 medium-9 columns">
    <?= $this->Form->create($attendee) ?>
    <fieldset>
        <legend><?= __('Add Attendee') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('scoutgroup_id', ['options' => $scoutgroups]);
            echo $this->Form->input('role_id', ['options' => $roles]);
            echo $this->Form->input('firstname');
            echo $this->Form->input('lastname');
            echo $this->Form->input('dateofbirth', [
                    'label' => 'Date of birth',
                    'minYear' => date('Y') - 80,
                    'maxYear' => date('Y') - 5,
                ]);
            echo $this->Form->input('phone');
            echo $this->Form->input('phone2');
            echo $this->Form->input('address_1');
            echo $this->Form->input('address_2');
            echo $this->Form->input('city');
            echo $this->Form->input('county');
            echo $this->Form->input('postcode');
            echo $this->Form->input('vegetarian');
            echo $this->Form->input('nightsawaypermit');
            echo $this->Form->input('applications._ids', ['options' => $applications, 'multiple' => 'checkbox']);
            echo $this->Form->input('allergies._ids', ['options' => $allergies, 'multiple' => 'checkbox']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
