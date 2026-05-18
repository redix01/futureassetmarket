@extends('pages.layout.app')
@section('content')

    <!-- about-style-three -->
    <section class="about-style-three pt_90 pb_100">
        <div class="auto-container">
            <div class="container">
                <h2>Section A – Introduction</h2>
                <h3>1. Introduction</h3>
                <p>1.1 Protecting your privacy and keeping your personal information confidential is very important to
                    us. This Privacy Policy (“Policy”) sets out how we collect and manage your personal and sensitive
                    information, in compliance with applicable privacy laws.</p>
                <p>1.2 This Policy describes the types of personal information that we collect about you when you choose
                    to use our services, how we’ll use your personal information and how we’ll keep it safe. Please take
                    the time to read this Policy carefully so that you can understand how we handle your personal
                    information.</p>

                <h3 class="mt-3">2. Who we are</h3>
                <p>2.1 {{ env('APP_NAME') }} is a limited company registered with a business address at Sea Sky Lane,
                    B201, Sandyport, Nassau, New Providence, The Bahamas. {{ env('APP_NAME') }} is part of a group of
                    companies. These companies are separate data controllers but are collectively referred to in this
                    Policy as “{{ env('APP_NAME') }}”, “we”, “us” or “our”.</p>
                <p>2.2 We’re an online trading platform which assists clients to trade over-the-counter derivatives,
                    including margin foreign exchange ("Forex") contracts and contracts-for-difference ("CFDs"). Our
                    online trading platforms operate through our website and mobile applications.</p>
                <p>2.3 “client”, “you” or “your” means an individual who’s the subject of the personal information that
                    we process as a data controller.</p>
                <p>2.4 We have appointed a data protection officer (“DPO”) who is responsible for overseeing questions
                    in relation to this Policy. If you have any questions about this Policy, including any requests to
                    exercise your legal rights, please contact the DPO using the details set out below:</p>
                <p><strong>Attn:</strong> Data Protection Officer<br>
                    <strong>Email:</strong> support@futureassetmarket.com</p>

                <h3 style="margin-top: 30px;">3. Scope of this Privacy Policy</h3>
                <p>3.1 This Policy (together with our Terms and Conditions and any other documents referred to in it)
                    sets out the basis on which we’ll process any personal information we collect from you, or that you
                    provide to us. This Policy also sets out how you can instruct us if you prefer to limit the use of
                    your personal information and the procedures that we have in place to safeguard your privacy.</p>
                <p>3.2 By using our website or apps, applying for an account with us or giving us information, you’re
                    indicating that you understand how we collect, use and disclose your personal information in line
                    with this Policy. If you don’t agree with this Policy, you mustn’t use our services, website, or
                    apps, or provide any information to us.</p>

                <h2 style="margin-top: 50px;">Section B – Collection of Personal Information</h2>
                <h3>4. What personal information we collect (or receive) about you</h3>
                <p>4.1 Personal information (also known as ‘personal data’) is any information or opinion about you that
                    is capable (or reasonably capable) of identifying you, whether the information or opinion is true or
                    not, and regardless of whether the information is recorded in a material form.</p>
                <p>4.2 Sensitive information includes things like your racial or ethnic origin, political opinions or
                    membership of political associations, religious or philosophical beliefs, membership of a
                    professional or trade association or trade union, sexual orientation or criminal record. Your
                    health, genetic and biometric information and biometric templates are also sensitive information.
                    Sensitive information is also personal information for the purposes of privacy laws. We’ll only
                    collect sensitive information about you if we have your consent, or if we’re required or authorised
                    by law.</p>
                <p>4.3 The personal information we collect about you generally includes the following:</p>
                <ul>
                    <li>name;</li>
                    <li>date of birth;</li>
                    <li>postal or email address;</li>
                    <li>IP address;</li>
                    <li>phone numbers, including home, mobile and work;</li>
                    <li>username, password;</li>
                    <li>information relating to an individual’s source of wealth;</li>
                    <li>occupation;</li>
                    <li>bank account details, including institution name, branch, account name, bank identifier, and
                        account number or IBAN;
                    </li>
                    <li>security questions and answers;</li>
                    <li>information relating to your trading experience;</li>
                    <li>identification documentation, including passport, driver’s licence, national identity card,
                        utility bills, trust deed, credit or bankruptcy check, and any other necessary documentation.
                    </li>
                </ul>
                <p>4.4 We’re required by law to identify you if you’re opening a new account or adding a new signatory
                    to an existing account. AML Laws require us to sight and record details of certain documents (i.e.
                    photographic and non-photographic documents).</p>
                <p>4.5 Where necessary, we also collect information on trustees, partners, company directors and
                    officers, officers of co-operatives and associations, client’s agents, beneficial owners of the
                    client, and persons dealing with us on a “one-off” basis.</p>
                <p>4.6 We may take steps to verify the information we collect. For example, a birth certificate provided
                    as identification may be verified with government-held records (such as births, deaths and marriages
                    registers) or we may verify employment and remuneration information with your employer.</p>

                <h3>5. Why we collect your personal information</h3>
                <p>5.1 We use your personal information to:</p>
                <ul>
                    <li>verify your identity;</li>
                    <li>provide you with the products and services that you’ve asked for;</li>
                    <li>help us monitor, evaluate and develop our products and services;</li>
                    <li>enable secure access to our client area;</li>
                    <li>keep you informed about our products and services and those of our partners, unless you opt
                        out;
                    </li>
                    <li>respond to any feedback, queries or complaints;</li>
                    <li>provide you with technical support;</li>
                    <li>participate in any third-party acquisition or potential acquisition involving our business;</li>
                    <li>comply with our legal obligations under applicable laws; and</li>
                    <li>detect and prevent fraud, crime or other harmful activities.</li>
                </ul>
                <h3 class="mt-3">6. How we collect personal information</h3>
                <p><strong>6.1</strong> We may collect personal information about you directly from you or from sources
                    other than you. “Sources other than you” may include your agents, family members, friends, related
                    entities, affiliates or divisions.</p>
                <p><strong>6.2</strong> We may collect (or receive) and process your personal information when:</p>
                <ul>
                    <li><strong>(a)</strong> you apply for an account with us;</li>
                    <li><strong>(b)</strong> you contact us, whether through our Website, our Apps or otherwise (for
                        example, via our online form, by e-mail, post, fax or phone), as we may keep a record of that
                        correspondence. For example, if you submit a complaint, report a problem with our services or
                        our Website or our Apps or otherwise liaise with our sales, technical support or any other
                        department in our company. This includes information provided by you when you update your
                        account such as your name, e-mail, country, password, etc;
                    </li>
                    <li><strong>(c)</strong> we ask you to complete surveys that we use for research purposes, although
                        you do not have to respond to them;
                    </li>
                    <li><strong>(d)</strong> you use and interact with our Website or our Apps including your device’s
                        manufacturer and model, IP address, browser type and version, time zone setting, browser plug-in
                        types and versions, operating system, web browser, platform, mobile carrier, and your ISP. We
                        may collect details of your visits to our Website or our Apps (including, but not limited to,
                        traffic data, location data, weblogs and other communication data). We do this via email and
                        website cookies, and similar tracking technology built into our Website and Apps. Our cookie
                        policy is available on our Website and Apps to give you more detailed information on how we use
                        them;
                    </li>
                    <li><strong>(e)</strong> you use your account to login to and use our platform technology and other
                        features and functionalities;
                    </li>
                    <li><strong>(f)</strong> you use the online trading products we provide to you. Under no
                        circumstances are these details disclosed to any third parties other than those who need to know
                        this information in the context of the services we provide;
                    </li>
                    <li><strong>(g)</strong> you use social media, including “like” buttons and similar functions made
                        available by social media platforms.
                    </li>
                </ul>

                <h3 class="mt-3">7. How we may use your personal information</h3>
                <p><strong>7.1</strong> We may process your personal information for the purpose of:</p>
                <ul>
                    <li><strong>(a)</strong> dealing with your inquiries and requests, including contacting you where
                        necessary;
                    </li>
                    <li><strong>(b)</strong> notifying you about important changes or developments to our Website, our
                        Apps or to our products or services (e.g. changes of features or enhancements);
                    </li>
                    <li><strong>(c)</strong> carrying out our obligations arising from any contracts connected to you;
                    </li>
                    <li><strong>(d)</strong> providing and personalising our services, enhancing client experience and
                        tailoring our services to you;
                    </li>
                    <li><strong>(e)</strong> providing you access to all parts or features of our Website, our Apps or
                        our services;
                    </li>
                    <li><strong>(f)</strong> where applicable, processing your payments;</li>
                    <li><strong>(g)</strong> administering your registration and/or membership and other account
                        records;
                    </li>
                    <li><strong>(h)</strong> market research, analysis and creating statistics;</li>
                    <li><strong>(i)</strong> sending you marketing communications, including push notifications in our
                        Apps, about products, special offers, and events you might be interested in;
                    </li>
                    <li><strong>(j)</strong> preventing, detecting and investigating potentially prohibited or illegal
                        activities, and enforcing our Terms and Conditions;
                    </li>
                    <li><strong>(k)</strong> improving and developing our Website, our Apps or our products and
                        services, and collecting feedback. For example:
                        <ul>
                            <li><strong>(i)</strong> gauging appeal of new features or products;</li>
                            <li><strong>(ii)</strong> inviting you to review our Website or App via independent
                                providers.
                            </li>
                        </ul>
                    </li>
                    <li><strong>(l)</strong> ensuring content is presented effectively for your device;</li>
                    <li><strong>(m)</strong> ensuring our Website and Apps are securely accessible;</li>
                    <li><strong>(n)</strong> complying with applicable laws and regulations;</li>
                    <li><strong>(o)</strong> debt recovery, crime, fraud and money laundering compliance;</li>
                    <li><strong>(p)</strong> recruitment if you apply for a role with us;</li>
                    <li><strong>(q)</strong> monitoring for abuse or security threats (e.g. trolls, hackers);</li>
                    <li><strong>(r)</strong> understanding client trends for tailoring our services and communications,
                        a process also known as segmentation or profiling; and
                    </li>
                    <li><strong>(s)</strong> testing new systems and processes in anonymous form.</li>
                </ul>

                <p><strong>7.2</strong> We may take steps to verify the information we collect, including checking
                    employment and remuneration details.</p>
                <p><strong>7.3</strong> We may validate your data against third-party databases.</p>
                <p><strong>7.4</strong> We may access your financial information (e.g., billing address, payment
                    history) to process payments and support requests. This data is shared only with necessary parties.
                </p>
                <p><strong>7.5</strong> Public domain social media content (e.g. posts, comments, media) may be
                    processed to respond or provide support.</p>
                <p><strong>7.6</strong> We may contact you about related products or services unless you opt out. We may
                    use post, phone, SMS, messaging apps, or email.</p>
                <p><strong>7.7</strong> If you post in our forums or platforms, we may process the content for
                    moderation and support.</p>
                <p><strong>7.8</strong> We may place cookies on your device to track usage. Advertising partners may use
                    this data (e.g. IP addresses) for targeted advertising (“Retargeting”). Details are in our Cookie
                    Policy.</p>
                <p><strong>7.9</strong> If you stop using our services, we may continue processing your data as outlined
                    unless you request otherwise. You can unsubscribe or contact us to stop email communication.</p>
                <h3>8. How we process your personal information</h3>
  <p><strong>8.1</strong> Our basis for collecting and using your personal information will depend on the personal information concerned and the specific context in which we collect it. In most cases, we’ll process your personal information where:</p>
  <ul>
    <li><strong>(a)</strong> you’ve consented to the use and disclosure of your personal information for our intended purposes either before or at the time that we collect it;</li>
    <li><strong>(b)</strong> we need the personal information to perform our contract with you; or</li>
    <li><strong>(c)</strong> the processing is in our legitimate interests (or those of a third party) and not overridden by your data protection interests or fundamental rights and freedoms.</li>
  </ul>
  <p><strong>8.2</strong> In some cases, we may also have a legal obligation to collect personal information from you or may otherwise need the personal information to protect vital interests.</p>
  <p><strong>8.3</strong> Where we rely on consent, if you don’t give us your consent or withdraw your consent, we may not be able to provide you with the products or services you ask for.</p>
  <p><strong>8.4</strong> You can withdraw your consent at any time. To withdraw your consent, please email <strong>support@futureassetmarket.com</strong> in the first instance.</p>

  <h3>9. Incomplete or inaccurate information</h3>
  <p><strong>9.1</strong> If you provide us with incomplete or inaccurate information, we may not be able to provide you with the products or services that you ask for. You can change your contact details at any time by updating your profile within your account.</p>

  <h3>10. Aggregated Data</h3>
  <p><strong>10.1</strong> Aggregated data is general data about groups of people which doesn’t identify anyone personally, for example the number of people in a particular industry that engage in forex trading. We use aggregated data to:</p>
  <ul>
    <li><strong>(a)</strong> help us to understand how you use our products and services and improve your experience with us; and</li>
    <li><strong>(b)</strong> customise the way that we communicate with you about our products and services so that we can interact with you more effectively.</li>
  </ul>
  <p><strong>10.2</strong> We may share aggregated data with our business or industry partners.</p>

  <h3>11. Anonymity and pseudonymity</h3>
  <p><strong>11.1</strong> In certain situations we may be able to give you the option of using a pseudonym or remain anonymous when you deal with us. We’re only able to provide you with this option when it’s practical for us to do so, and if we’re not required by law to identify you.</p>



            </div>
        </div>
    </section>
    <!-- about-style-three end -->

@endsection
