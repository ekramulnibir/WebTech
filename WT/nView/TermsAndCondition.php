<?php
session_start();
include 'Header.php';

function generateTermsAndConditions() {
    $content = '
    <html>
    <head>
        <title>Terms and Conditions</title>
    </head>
    <body>
        <h1>Terms and Conditions</h1>
        <ol>
            <li>
                <strong>Acceptance of Terms</strong><br>
                By accessing and using the Hospital Management System website, you agree to comply with and be bound by the following terms and conditions.
            </li>
            <li>
                <strong>Use of the Website</strong><br>
                <ol type="a">
                    <li>
                        The Hospital Management System website is intended for informational purposes and to provide services related to hospital management.
                    </li>
                    <li>
                        You agree to use the website solely for lawful purposes and in accordance with all applicable laws and regulations.
                    </li>
                    <li>
                        Unauthorized use of the website may give rise to a claim for damages and/or be a criminal offense.
                    </li>
                </ol>
            </li>
            <li>
                <strong>Intellectual Property</strong><br>
                <ol type="a">
                    <li>
                        The Hospital Management System website and its contents (including text, graphics, logos, images, software, etc.) are the property of the website owner and are protected by intellectual property laws.
                    </li>
                    <li>
                        You may not reproduce, distribute, modify, or exploit any content from the website without obtaining prior written permission from the website owner.
                    </li>
                </ol>
            </li>
            <li>
                <strong>User Accounts</strong><br>
                <ol type="a">
                    <li>
                        To access certain features or services on the website, you may need to create a user account.
                    </li>
                    <li>
                        You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account.
                    </li>
                    <li>
                        The website owner reserves the right to suspend or terminate your account if you violate any terms and conditions or engage in any unauthorized activities.
                    </li>
                </ol>
            </li>
            <li>
                <strong>Privacy Policy</strong><br>
                <ol type="a">
                    <li>
                        The collection and use of personal information on the Hospital Management System website are governed by the website\'s Privacy Policy.
                    </li>
                    <li>
                        By using the website, you consent to the collection, storage, and processing of your personal information as outlined in the Privacy Policy.
                    </li>
                </ol>
            </li>
            <li>
                <strong>Limitation of Liability</strong><br>
                <ol type="a">
                    <li>
                        The Hospital Management System website and its owners shall not be liable for any damages or losses arising from the use or inability to use the website or its services.
                    </li>
                    <li>
                        The website owner does not guarantee the accuracy, completeness, or reliability of any information on the website.
                    </li>
                </ol>
            </li>
            <li>
                <strong>Third-Party Links</strong><br>
                <ol type="a">
                    <li>
                        The website may contain links to third-party websites or services that are not owned or controlled by the website owner.
                    </li>
                    <li>
                        The inclusion of any third-party links does not imply endorsement or responsibility for the content, products, or services provided by those websites.
                    </li>
                </ol>
            </li>
            <li>
                <strong>Modifications to Terms and Conditions</strong><br>
                The website owner reserves the right to modify or update these terms and conditions at any time without prior notice. Your continued use of the website after any changes constitutes acceptance of the modified terms.
            </li>
            <li>
                <strong>Governing Law and Jurisdiction</strong><br>
                These terms and conditions shall be governed by and construed in accordance with the laws of the applicable jurisdiction. Any disputes arising from the use of the website shall be subject to the exclusive jurisdiction of the courts in that jurisdiction.
            </li>
        </ol>
    </body>
    </html>
    ';

    return $content;
}

echo generateTermsAndConditions();

include 'Footer.php';
?>
