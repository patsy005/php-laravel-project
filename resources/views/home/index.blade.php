@extends('layouts.app')

@section('title', 'Strona główna')

@section('content')
<div class="wrapper">
    <div class="row">
        <div class="col-12">

            <section class="section section mt-5">
                <div class="heading mb-5">
                    <h1>Dashboard</h1>
                    <p>Welcome back, {{ $employee->name}} !</p>
                </div>

                <div class="overview section-box mb-5">
                    <div class="overview-top d-flex justify-content-between">
                        <p class="overview-title col-6">Overview from last 30 days</p>
                        <!-- <select name="numOfDays" id="numOfDays" class="stats-dropdown col-5 col-sm-4">
										<option value="7">Last 7 days</option>
										<option value="14">Last 14 days</option>
										<option value="30">Last 30 days</option>
									</select>

									<button>Check</button> -->
                    </div>

                    <div class="overview-content d-flex justify-content-between col-12">
                        <div class="overview-card col-sm-3 col-xxl-2 mt-3">
                            <div class="overview-card__icon-box overview-card__icon-box--bookings">
                                <img src="icons/bookings.svg" alt="" />
                            </div>

                            <div class="overview-card__stats">
                                <div class="overview-card__stats--box overview-card__stats--box-bookings">
                                    <div class="overview-card__stats--title">bookings</div>
                                    <div class="overview-card__stats--number">
                                        {{ $numOfBookings }}
                                    </div>
                                </div>
                                <!-- <div class="overview-card__percentage-stats overview-card__percentage-stats--plus">
												<p class="overview-card__percentage-stats--text">
													<span>+</span>
													<span>34.6</span>
													%
												</p>
											</div> -->
                            </div>

                        </div>

                        <div class="overview-card col-sm-3 col-xxl-2 mt-3">
                            <div class="overview-card__icon-box overview-card__icon-box--checkins">
                                <img src="icons/checkins.svg" alt="" />
                            </div>

                            <div class="overview-card__stats">
                                <div class="overview-card__stats--box overview-card__stats--box-checkins">
                                    <div class="overview-card__stats--title">Check ins</div>
                                    <div class="overview-card__stats--number">
                                        {{ $checkIns }}
                                    </div>
                                </div>

                                <!-- <div class="overview-card__percentage-stats overview-card__percentage-stats--minus">
												<p class="overview-card__percentage-stats--text">
													<span>-</span>
													<span>34,6</span>
													%
												</p>
											</div> -->
                            </div>
                        </div>

                        <div class="overview-card col-sm-3 col-xxl-2 mt-3">
                            <div class="overview-card__icon-box overview-card__icon-box--occupancy">
                                <img src="icons/occupancy-rate.svg" alt="" />
                            </div>

                            <div class="overview-card__stats">
                                <div class="overview-card__stats--box overview-card__stats--box-occupancy">
                                    <div class="overview-card__stats--title">occupancy</div>
                                    <div class="overview-card__stats--number">
                                        {{ $occupancyRate }} %
                                    </div>
                                </div>

                                <!-- <div class="overview-card__percentage-stats overview-card__percentage-stats--plus">
												<p class="overview-card__percentage-stats--text">
													<span>+</span>
													<span>34,5</span>
													%
												</p>
											</div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section section__popular-igloos mt-5">
                <div class="heading mb-5">
                    <h2>Igloos</h2>
                    <p>Discover our igloos</p>
                </div>

                <div class="popular-igloos">

                </div>
            </section>
        </div>
    </div>
</div>

<script>
    window.routes = {
        igloosJson: "{{ route('igloos.json') }}"
    };
</script>

@endsection