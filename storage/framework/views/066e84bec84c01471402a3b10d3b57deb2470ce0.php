

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('User'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    <link href="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
    <style>
        .large {
            width: 30px;
            height: 30px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo app('translator')->get('User'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('User'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="card">
        <div class="card-body">
            <h2 class="card-title"><b><?php echo app('translator')->get('User Profile'); ?></b></h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="avatar">
                        <img alt="" src="<?php echo e(asset($user->avatar)); ?>" class="users-avatar-shadow rounded-circle"
                            height="150" width="150" style="object-fit: cover; object-position: 0% 0%;">
                    </div>
                    <hr>
                    <div class="md-3" style="">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="userDetail"><strong><?php echo app('translator')->get('Name: '); ?> </strong> <?php echo e($user->name); ?></p>
                            </div>
                            <div class="col-md-6">
                                <p class="userDetail"><strong><?php echo app('translator')->get('Email: '); ?></strong><?php echo e($user->email); ?></p>
                            </div>
                            <div class="col-md-6">
                                <p class="userDetail"><strong><?php echo app('translator')->get('Height: '); ?></strong><?php echo e($user->height); ?></p>
                            </div>
                            <div class="col-md-6">
                                <p class="userDetail"><strong><?php echo app('translator')->get('Starting Weight: '); ?></strong><?php echo e($user->starting_weight); ?></p>
                            </div>
                            <div class="col-md-6">
                                <p class="userDetail"><strong><?php echo app('translator')->get('Starting Weight: '); ?></strong><?php echo e($user->handedness); ?></p>
                            </div>
                            <div class="col-md-6">
                                <p class="userDetail"><strong><?php echo app('translator')->get('Age: '); ?></strong><?php echo e($user->age); ?></p>
                            </div>
                            <div class="col-md-6">
                                <p class="userDetail"><strong><?php echo app('translator')->get('School: '); ?></strong><?php echo e($user->school); ?></p>
                            </div>
                            <div class="col-md-6">
                                <p class="userDetail"><strong for="batch"><?php echo app('translator')->get('Level: '); ?></strong><?php echo e($user->level); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="row">
                            <div class="col-md-2 p-md-0">
                                <button type="button" class="btn btn-block btn-success btn-flat btn-edit-profile"
                                    data-id="353" style="width:100%; margin-top:5px;"><?php echo app('translator')->get('Edit Profile'); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h2 class="card-title"><b>Assessments</b></h2>
            <div class="row">
                <div class="col-md-6">
                    <h6>Physical Assessment</h6>
                    <table class="table table-responsive table-bordered table-hover" data-type="physical">
                        <thead class="thead-dark">
                            <tr>
                                <th>Assessment</th>
                                <th>Acceptable</th>
                                <th>Caution</th>
                                <th>Opportunity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-id="1">
                                <td>Gross Posture Anomalies</td>
                                <td><input type="radio" name="phy_1" class="form-radio" value="0"></td>
                                <td><input type="radio" name="phy_1" class="form-radio" value="1"></td>
                                <td><input type="radio" name="phy_1" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="2">
                                <td>Shrugging</td>
                                <td><input type="radio" name="phy_2" class="form-radio" value="0"></td>
                                <td><input type="radio" name="phy_2" class="form-radio" value="1"></td>
                                <td><input type="radio" name="phy_2" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="3">
                                <td>Asymmetrical Upward Rotation</td>
                                <td><input type="radio" name="phy_3" class="form-radio" value="0"></td>
                                <td><input type="radio" name="phy_3" class="form-radio" value="1"></td>
                                <td><input type="radio" name="phy_3" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="4">
                                <td>Winging On Descent</td>
                                <td><input type="radio" name="phy_4" class="form-radio" value="0"></td>
                                <td><input type="radio" name="phy_4" class="form-radio" value="1"></td>
                                <td><input type="radio" name="phy_4" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="5">
                                <td>Eccentric Control</td>
                                <td><input type="radio" name="phy_5" class="form-radio" value="0"></td>
                                <td><input type="radio" name="phy_5" class="form-radio" value="1"></td>
                                <td><input type="radio" name="phy_5" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="6">
                                <td>Lat Activation</td>
                                <td><input type="radio" name="phy_6" class="form-radio" value="0"></td>
                                <td><input type="radio" name="phy_6" class="form-radio" value="1"></td>
                                <td><input type="radio" name="phy_6" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="7">
                                <td>GIRD Deficit</td>
                                <td><input type="radio" name="phy_7" class="form-radio" value="0"></td>
                                <td><input type="radio" name="phy_7" class="form-radio" value="1"></td>
                                <td><input type="radio" name="phy_7" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="17">
                                <td>Pec Quality</td>
                                <td><input type="radio" name="phy_17" class="form-radio" value="0"></td>
                                <td><input type="radio" name="phy_17" class="form-radio" value="1"></td>
                                <td><input type="radio" name="phy_17" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="18">
                                <td>Flat Foot</td>
                                <td><input type="radio" name="phy_18" class="form-radio" value="0"></td>
                                <td><input type="radio" name="phy_18" class="form-radio" value="1"></td>
                                <td><input type="radio" name="phy_18" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="19">
                                <td>Palms to floor</td>
                                <td><input type="radio" name="phy_19" class="form-radio" value="0"></td>
                                <td><input type="radio" name="phy_19" class="form-radio" value="1"></td>
                                <td><input type="radio" name="phy_19" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="20">
                                <td>Back Bridge</td>
                                <td><input type="radio" name="phy_20" class="form-radio" value="0"></td>
                                <td><input type="radio" name="phy_20" class="form-radio" value="1"></td>
                                <td><input type="radio" name="phy_20" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="21">
                                <td>One legged balance holds</td>
                                <td><input type="radio" name="phy_21" class="form-radio" value="0"></td>
                                <td><input type="radio" name="phy_21" class="form-radio" value="1"></td>
                                <td><input type="radio" name="phy_21" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="22">
                                <td>Front Split</td>
                                <td><input type="radio" name="phy_22" class="form-radio" value="0"></td>
                                <td><input type="radio" name="phy_22" class="form-radio" value="1"></td>
                                <td><input type="radio" name="phy_22" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="23">
                                <td>Side Split</td>
                                <td><input type="radio" name="phy_23" class="form-radio" value="0"></td>
                                <td><input type="radio" name="phy_23" class="form-radio" value="1"></td>
                                <td><input type="radio" name="phy_23" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="24">
                                <td>Dead Hang</td>
                                <td><input type="radio" name="phy_24" class="form-radio" value="0"></td>
                                <td><input type="radio" name="phy_24" class="form-radio" value="1"></td>
                                <td><input type="radio" name="phy_24" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="25">
                                <td>One Arm Hang</td>
                                <td><input type="radio" name="phy_25" class="form-radio" value="0"></td>
                                <td><input type="radio" name="phy_25" class="form-radio" value="1"></td>
                                <td><input type="radio" name="phy_25" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="26">
                                <td>Thrower's Stretch</td>
                                <td><input type="radio" name="phy_26" class="form-radio" value="0"></td>
                                <td><input type="radio" name="phy_26" class="form-radio" value="1"></td>
                                <td><input type="radio" name="phy_26" class="form-radio" value="2"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <h6>Mechanical Assessment</h6>
                    <table class="table table-responsive table-bordered table-hover" data-type="mechanical">
                        <thead class="thead-dark">
                            <tr>
                                <th>Assessment</th>
                                <th>Acceptable</th>
                                <th>Caution</th>
                                <th>Opportunity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-id="1">
                                <td>Back leg co-contraction</td>
                                <td><input type="radio" name="mech_1" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_1" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_1" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="2">
                                <td>Does Not Counter Rotate</td>
                                <td><input type="radio" name="mech_2" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_2" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_2" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="3">
                                <td>Shifts to Ball of Foot on Time</td>
                                <td><input type="radio" name="mech_3" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_3" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_3" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="4">
                                <td>Quality of Pelvic Tilt</td>
                                <td><input type="radio" name="mech_4" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_4" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_4" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="5">
                                <td>Direction of Load</td>
                                <td><input type="radio" name="mech_5" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_5" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_5" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="6">
                                <td>Butt Behind Heel</td>
                                <td><input type="radio" name="mech_6" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_6" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_6" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="7">
                                <td>Back Knee Not Forward of Toes</td>
                                <td><input type="radio" name="mech_7" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_7" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_7" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="8">
                                <td>Lead Leg Does Not Open Early</td>
                                <td><input type="radio" name="mech_8" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_8" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_8" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="9">
                                <td>Foot Plant From Above</td>
                                <td><input type="radio" name="mech_9" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_9" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_9" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="10">
                                <td>Lead Leg Co-Contraction</td>
                                <td><input type="radio" name="mech_10" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_10" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_10" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="11">
                                <td>Front Knee Does Not Leak Forward</td>
                                <td><input type="radio" name="mech_11" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_11" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_11" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="12">
                                <td>Front Knee Does Not Wiggle Laterally</td>
                                <td><input type="radio" name="mech_12" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_12" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_12" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="13">
                                <td>Cross Acromial Line</td>
                                <td><input type="radio" name="mech_13" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_13" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_13" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="14">
                                <td>Shoulder Rotates in Plane</td>
                                <td><input type="radio" name="mech_14" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_14" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_14" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="15">
                                <td>Pronated Takeaway</td>
                                <td><input type="radio" name="mech_15" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_15" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_15" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="16">
                                <td>Inverted W</td>
                                <td><input type="radio" name="mech_16" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_16" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_16" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="17">
                                <td>Elevated Distal Humerus</td>
                                <td><input type="radio" name="mech_17" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_17" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_17" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="18">
                                <td>Forearm Flyout</td>
                                <td><input type="radio" name="mech_18" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_18" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_18" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="19">
                                <td>Forearm Play</td>
                                <td><input type="radio" name="mech_19" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_19" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_19" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="20">
                                <td>Scap Retracts to Spine</td>
                                <td><input type="radio" name="mech_20" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_20" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_20" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="21">
                                <td>Glove Side Co-Contracts</td>
                                <td><input type="radio" name="mech_21" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_21" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_21" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="22">
                                <td>Hips Rotate Before Shoulders</td>
                                <td><input type="radio" name="mech_22" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_22" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_22" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="23">
                                <td>Does Not Disconnect Posture Laterally</td>
                                <td><input type="radio" name="mech_23" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_23" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_23" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="24">
                                <td>Rotate to Back Foot</td>
                                <td><input type="radio" name="mech_24" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_24" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_24" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="25">
                                <td>Trail Hip Parallel to Lead Hip</td>
                                <td><input type="radio" name="mech_25" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_25" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_25" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="26">
                                <td>Gets to Late Launch</td>
                                <td><input type="radio" name="mech_26" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_26" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_26" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="27">
                                <td>Shoulder Internally Rotates, Forearm Pronates</td>
                                <td><input type="radio" name="mech_27" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_27" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_27" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="28">
                                <td>Elbow Stays Loose and Bent</td>
                                <td><input type="radio" name="mech_28" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_28" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_28" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="29">
                                <td>Shoulders Trade Places</td>
                                <td><input type="radio" name="mech_29" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_29" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_29" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="30">
                                <td>Rotates Around Front Hip</td>
                                <td><input type="radio" name="mech_30" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_30" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_30" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="31">
                                <td>Elbow Does Not Cross Midline</td>
                                <td><input type="radio" name="mech_31" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_31" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_31" class="form-radio" value="2"></td>
                            </tr>
                            <tr data-id="32">
                                <td>Avoids Late Bang on Posterior Shoulder</td>
                                <td><input type="radio" name="mech_32" class="form-radio" value="0"></td>
                                <td><input type="radio" name="mech_32" class="form-radio" value="1"></td>
                                <td><input type="radio" name="mech_32" class="form-radio" value="2"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title"><b>Questionnaire</b></h2>
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Question</th>
                                    <th>Answer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>What are your goals regarding training?</td>
                                    <td></td>
                                </tr>
                                <tr data-id="2">
                                    <td>Have you had any significant injuries? (anything keeping you off the field 2 weeks
                                        or more)</td>
                                    <td></td>
                                </tr>
                                <tr data-id="3">
                                    <td>Rank yourself amongst your peers worldwide in velocity, command, secondary stuff,
                                        and competitiveness (average, below average, above average)</td>
                                    <td></td>
                                </tr>
                                <tr data-id="4">
                                    <td>Are you happy with your current weight/body comp?</td>
                                    <td></td>
                                </tr>
                                <tr data-id="5">
                                    <td>Please walk me through a typical day for you</td>
                                    <td></td>
                                </tr>
                                <tr data-id="7">
                                    <td>What equipment do you have access to? ( bands, barbell, etc.)</td>
                                    <td></td>
                                </tr>
                                <tr data-id="8">
                                    <td>8. Will you be playing summer ball? (Ignore if off-season or professional)</td>
                                    <td></td>
                                </tr>
                                <tr data-id="9">
                                    <td>What are your biggest fears in regard to your baseball career?</td>
                                    <td></td>
                                </tr>
                                <tr data-id="10">
                                    <td>If you were to throw 150 pitches in a game where would you be sore at the next day?
                                    </td>
                                    <td></td>
                                </tr>
                                <tr data-id="11">
                                    <td>Would you be willing to buy additional training tools?</td>
                                    <td></td>
                                </tr>
                                <tr data-id="12">
                                    <td>Are you against weighted ball training?</td>
                                    <td></td>
                                </tr>
                                <tr data-id="13">
                                    <td>Name five of your closest friends or teammates who may share the same training
                                        philosophy as you</td>
                                    <td></td>
                                </tr>
                                <tr data-id="14">
                                    <td>Do you have any issues with Connected Performance LLC posting content of you on
                                        social media?</td>
                                    <td></td>
                                </tr>
                                <tr data-id="16">
                                    <td>Will you have access to a radar gun?</td>
                                    <td></td>
                                </tr>
                                <tr data-id="15">
                                    <td>Please provide us a video and numbers of your 1 rep max in: squat, bench, deadlift
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\Admin\resources\views/supperadmin/user_view.blade.php ENDPATH**/ ?>