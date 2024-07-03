<div class="d-flex justify-content-center align-items-center" style="height: 70vh">
    <div class="col-3">
        <div class="text-center">
            <h3>Login</h3>
        </div>
        <?= $this->Flash->render(); ?>
        <?= $this->Form->create(null, ['class' => 'form-signin']); ?>
        <div class="form-group">
            <?= $this->Form->control('email', [
                'class' => 'form-control',
                'label' => 'Email',
                'placeholder'=>'Enter email'
            ]); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->control('password', [
                'class' => 'form-control',
                'label' => 'Password',
                'placeholder'=>'Enter password',
            ]); ?>
        </div>
        <div class="mt-2">
        <?= $this->Form->button(__('Login'), ['class' => 'btn btn-primary']); ?>
        </div>
        <?= $this->Form->end(); ?>
    </div>
</div>
