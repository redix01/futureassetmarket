@extends('pages.layout.app')
@section('content')

    <!-- about-style-three -->
    <section class="about-style-three pt_90 pb_100">
        <div class="auto-container">
            <div class="container mt-5 mb-5">
  <h3 class="mb-4">Platform Regulations and Usage Policy</h3>

  <p class="mb-3">
    {{ env('APP_NAME') }} operates under a strict compliance framework to ensure that all trading activities on the platform are conducted with transparency, integrity, and in accordance with applicable financial regulations. By accessing or using our services, you agree to abide by the terms outlined in this regulation policy, including periodic updates made to reflect legal or operational changes.
  </p>

  <p class="mb-3">
    All users of {{ env('APP_NAME') }} are required to complete a full identity verification (KYC) process before initiating any trades or transactions. This is to ensure adherence to Anti-Money Laundering (AML) laws and to protect our ecosystem from fraudulent activities. Failure to provide accurate information may result in limited access or account suspension.
  </p>

  <p class="mb-3">
    {{ env('APP_NAME') }} reserves the right to monitor, flag, and restrict any activity deemed suspicious, abusive, or non-compliant with financial standards. We may also cooperate with legal authorities if an account is associated with illegal operations or market manipulation.
  </p>

  <p class="mb-3">
    The use of automated trading bots, scripts, or third-party integrations must be pre-approved by our compliance team. Any unauthorized access, data scraping, or disruption of platform services will be considered a breach of our policy and could result in legal action.
  </p>

  <p class="mb-3">
    By continuing to use {{ env('APP_NAME') }}, you acknowledge that you understand and accept the responsibilities outlined in this regulation. We encourage all users to stay informed about updates to our policy and reach out to support@futureassetmarket.com for clarifications or concerns regarding regulatory matters.
  </p>
</div>

        </div>
    </section>
    <!-- about-style-three end -->

@endsection
