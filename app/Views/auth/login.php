<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><?=lang('Auth.loginTitle')?></h1>
                                    </div>

                                    <?= view('\Myth\Auth\Views\_message_block') ?>

                                    <form action="<?= route_to('login') ?>" method="post" class="user">
                                        <?= csrf_field() ?> 

                                        <?php if ($config->validFields === ['email']): ?>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
                                            aria-describedby="emailHelp"
                                            name="login" placeholder="<?=lang('Auth.email')?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.login') ?>
                                            </div>
                                        </div>
                                        <?php else: ?>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
                                            aria-describedby="emailHelp"
                                            name="login" placeholder="<?=lang('Auth.emailOrUsername')?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.login') ?>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>"
                                                name="password" placeholder="<?=lang('Auth.password')?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.password') ?>
                                            </div>
                                        </div>
                                        
                                        <?php if ($config->allowRemembering): ?>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="checkbox" <?php if(old('remember')) : ?> checked <?php endif ?>>
                                                <label class="custom-control-label" for="customCheck"><?=lang('Auth.rememberMe')?>
                                            </label>
                                            </div>
                                        </div>
                                        <?php endif; ?>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            <?=lang('Auth.loginAction')?>
                                        </button>

                                    </form>
                                    <hr>
                                    <?php if ($config->allowRegistration) : ?>
                                        <div class="text-center">
                                            <a class="small" href="<?= route_to('register') ?>"><?=lang('Auth.needAnAccount')?></a>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($config->activeResetter): ?>
                                        <div class="text-center">
                                            <a class="small" href="<?= route_to('forgot') ?>"><?=lang('Auth.forgotYourPassword')?></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
<?= $this->endSection(); ?>   