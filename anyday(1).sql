-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2020 at 06:42 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anyday`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply_nows`
--

CREATE TABLE `apply_nows` (
  `id` int(11) NOT NULL,
  `full_name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `loan_type` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apply_nows`
--

INSERT INTO `apply_nows` (`id`, `full_name`, `email`, `phone`, `loan_type`, `city`, `state`, `created_at`, `updated_at`) VALUES
(1, 'ddss sddsds', 'aa@gmail.com', '232332323', 'Personal Loan', 'ddsdds', 'Chandigarh', '2020-10-16 15:28:56', '2020-10-16 15:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `contact_forms`
--

CREATE TABLE `contact_forms` (
  `id` int(11) NOT NULL,
  `full_name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `message` text NOT NULL,
  `type` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_forms`
--

INSERT INTO `contact_forms` (`id`, `full_name`, `email`, `phone`, `message`, `type`, `created_at`, `updated_at`) VALUES
(1, 'ddss sddsds', 'aa@gmail.com', '232332323', 'efefe', 'contact-us', '2020-10-03 07:22:38', '2020-10-03 07:22:38'),
(2, 'wdwdwd', 'dwdwd@gmail.com', '21313133', 'sdsadasd', 'partner-with-us', '2020-10-03 07:24:16', '2020-10-03 07:24:16'),
(3, 'd', 'fdsds@gmail.com', '232332323', 'sadda', 'partner-with-us', '2020-10-12 09:42:23', '2020-10-12 09:42:23'),
(4, 'ddss sddsds', 'aa@gmail.com', '232332323', 'fsdfdf', 'contact-us', '2020-10-12 09:43:43', '2020-10-12 09:43:43'),
(5, 'eee ef', 'aa@gmail.com', '232332323', 'ed', 'contact-us', '2020-10-12 10:07:56', '2020-10-12 10:07:56'),
(6, 'Gurjeevan kaur', 'aa@gmail.com', '232323232', 'efwefe', 'contact-us', '2020-10-12 10:08:18', '2020-10-12 10:08:18'),
(7, 'Gurjeevan kaur', 'aa@gmail.com', '232323232', 'efwefe', 'contact-us', '2020-10-12 10:08:44', '2020-10-12 10:08:44'),
(8, 'ddss sddsds', 'aa@gmail.com', '232332323', 'jhjh', 'partner-with-us', '2020-10-16 06:04:37', '2020-10-16 06:04:37'),
(9, 'ddss sddsds', 'aa@gmail.com', '232332323', 'hjhj', 'contact-us', '2020-10-16 06:05:15', '2020-10-16 06:05:15');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'What is Poonawalla Credit Private Limited?', '<p>Poonawalla Credit Private Limited is (PCPL), a non-banking financial company, registered with the Reserve Bank of India. AnyDay Money is the android and ios based application.</p>\r\n\r\n<p>This entire platform is technologically powered by AnyDay Fintech Private Limited, the fintech vertical of JetSynthesys Private Limited</p>', '2020-10-18 08:16:10', '2020-10-18 08:16:10'),
(2, 'What is NACH form and why is this mandatory?', '<p>NACH stands for National Automated Clearing House. The National Payments Corporation of India (NPCI) has implemented NACH for banks, NBFCs etc a web-based solution to facilitate inter-bank electronic transactions which are periodic in nature</p>\r\n\r\n<p>For automated recovery of the sanctioned loan amount and interest on the due date, we need this mandate form signed by you to facilitate the total amount back into the PFPL bank account.</p>', '2020-10-18 08:16:26', '2020-10-18 08:16:26'),
(3, 'How can I check the transaction history of my loan?', '<p>NACH stands for National Automated Clearing House. The National Payments Corporation of India (NPCI) has implemented NACH for banks, NBFCs etc a web-based solution to facilitate inter-bank electronic transactions which are periodic in nature</p>\r\n\r\n<p>For automated recovery of the sanctioned loan amount and interest on the due date, we need this mandate form signed by you to facilitate the total amount back into the PFPL bank account.</p>', '2020-10-18 08:16:37', '2020-10-18 08:16:37'),
(4, 'How can I check the transaction history of my loan?', '<p>Transaction history of your loan and the relevant details will be available from Website and Mobile App</p>', '2020-10-18 08:16:53', '2020-10-18 08:16:53'),
(5, 'Do I have an option to repay the loan earlier and how?', '<p>Yes of course. This can be done either through the Mobile App or Website. No additional charges for pre-paying loan.</p>', '2020-10-18 08:17:11', '2020-10-18 08:17:11'),
(6, 'What if there isn’t enough money in my bank account on my repayment date?', '<p>At the outset, our suggestion would be that you maintain enough money in your bank account as we would send debit instruction to your bank on the repayment due date. In case NACH is bounced, we will levy penal charges for every bounce instance and you shall also be liable to pay interest on delayed payment.</p>', '2020-10-18 08:17:28', '2020-10-18 08:17:28'),
(7, 'What is AnyDay Salary?', '<p>AnyDay Salary is an unsecured loan offering provided to salaried individuals to tide over their mid-month planned and un-planned financial needs. This loan shall be recovered from your salary. The borrower has the option to repay the loan either in one shot or in up to 6 Equated Monthly Instalments (EMIs).</p>\r\n\r\n<p>This loan is provided in easy and simple steps, either through our Website or our Mobile App.</p>', '2020-10-18 08:17:42', '2020-10-18 08:17:42'),
(8, 'What is the Eligibility Criteria to avail AnyDay Salary?', '<p>To apply for the AnyDay Salary loan, you must be</p>\r\n\r\n<p>An Indian resident with at least 21 years of age and above<br />\r\nResident of Pune and/or select cities in India<br />\r\nYour minimum net take home salary should be INR 15,000/- per month with confirmed employment</p>', '2020-10-18 08:17:54', '2020-10-18 08:17:54'),
(9, 'What are the minimum and maximum amounts available as AnyDay Salary loan?', '<p>You can borrow from INR 10,000/- up to INR 2,00,000/- (subject to a maximum of up to 3 times of your net take home monthly salary)</p>', '2020-10-18 08:18:08', '2020-10-18 08:18:08'),
(10, 'What is the repayment period available for AnyDay Salary?', '<p>AnyDay Salary loan can be repaid in one shot (i.e. for less than 30 days) or maximum up to a period of 365 days (max twelve EMIs)</p>', '2020-10-18 08:18:21', '2020-10-18 08:18:21'),
(11, 'How can I apply for AnyDay Salary?', '<p>Simply visit www.anydaymoney.com (or download mobile App &ndash; ANYDAY MONEY) to apply for the AnyDay Salary.</p>', '2020-10-18 08:18:35', '2020-10-18 08:18:35'),
(12, 'How long will it take to disburse the loan?', '<p>Application process is as follows</p>\r\n\r\n<p>Visit www.anydaymoney.com for applying either on the website itself or download the Mobile App to apply for the loan;<br />\r\nAfter filling up the simple form, upload all the required documents;<br />\r\nWe validate your eligibility criteria and confirm Loan amount and tenure applicable to you;<br />\r\nAfter your KYC and credit verification, loan agreement is signed, and loan amount is disbursed immediately to your Salary Bank Account and you are notified of the same.</p>', '2020-10-18 08:18:48', '2020-10-18 08:18:48'),
(13, 'What Documents are required for Loan Application?', '<p>he following documents are required:</p>\r\n\r\n<p>Photograph/Selfie<br />\r\nLast three months&rsquo; payslips<br />\r\nLast six months&rsquo; Bank statements where salary is being credited<br />\r\nSelf-attested Copy of PAN Card<br />\r\nSelf-attested Copy of AADHAR Card (both front and back side)/Driving License<br />\r\nCopy of Cancelled signed cheque of bank account where salary is being deposited<br />\r\nPlease note that none of the images of these above documents should be blurred. Bank statements<br />\r\nare best uploaded in pdf format</p>', '2020-10-18 08:19:01', '2020-10-18 08:19:01'),
(14, 'What if I am unable to upload documents on the website/app?', '<p>As you start uploading the documents, we will compress the file sizes so that you don&rsquo;t have to wait to upload your documents. However, if any problem persists you could email the required documents to support@anydaymoney.com or call us on +91 74477 99942 for assistance.</p>', '2020-10-18 08:19:15', '2020-10-18 08:19:15'),
(15, 'Do I have to provide any guarantors?', '<p>As you start uploading the documents, we will compress the file sizes so that you don&rsquo;t have to wait to upload your documents. However, if any problem persists you could email the required documents to support@anydaymoney.com or call us on +91 74477 99942 for assistance.</p>', '2020-10-18 08:19:26', '2020-10-18 08:19:26'),
(16, 'Do I have to provide any guarantors?', '<p>No guarantors are required for obtaining AnyDay Salary.</p>', '2020-10-18 08:19:38', '2020-10-18 08:19:38'),
(17, 'What interest do I have to pay on the Loan amount?', '<p>Interest is charged INR 6.67 per day on a loan of INR 10,000/- borrowed. This translates into less than 0.07% per day of the loan amount.</p>', '2020-10-18 08:19:49', '2020-10-18 08:19:49'),
(18, 'What are the processing fee and other charges payable?', '<table cellpadding=\"0\" cellspacing=\"0\">\r\n	<caption>Processing Fee#</caption>\r\n	<thead>\r\n		<tr>\r\n			<td>Product</td>\r\n			<td>Processing Fee #</td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>AnyDay Salary</td>\r\n			<td>2% of Loan Amount</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table cellpadding=\"0\" cellspacing=\"0\">\r\n	<caption>Processing Fee#</caption>\r\n	<thead>\r\n		<tr>\r\n			<td>Charge Type</td>\r\n			<td>Amount</td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Stamp Duty</td>\r\n			<td>0.1% of the loan amount or INR 100/- whichever is higher</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Late Payment Fee</td>\r\n			<td>3% per month on the amount due or INR 500 whichever is higher</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p># All charges will attract the prevailing GST rate except Stamp Duty payable on the loan agreement</p>', '2020-10-18 08:20:05', '2020-10-18 08:20:05'),
(19, 'Why do you need Bank account details?', '<p>Details of your bank account where the salary is being deposited is important for us to validate your salary data and will also help us disburse the loan amount into this account.</p>', '2020-10-18 08:20:18', '2020-10-18 08:20:18'),
(20, 'Moratorium Guidelines', '<p>As per the Notification on Loan EMI Moratorium issued by the Reserve Bank of India on March 27, 2020, vide notification number DOR.No.BP.BC.47/21.04.048/2019-20 , if you wish to to apply for a Moratorium on your loan EMIs, kindly send an email to support@anydaymoney.com with the subject as &ldquo;Request for Loan Moratorium&rdquo; and mentioning your Name and Loan Ids.</p>', '2020-10-18 08:20:30', '2020-10-18 08:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` int(11) NOT NULL,
  `banner_image` text DEFAULT NULL,
  `main_title` text NOT NULL,
  `title` text NOT NULL,
  `sub_title` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_sliders`
--

INSERT INTO `home_sliders` (`id`, `banner_image`, `main_title`, `title`, `sub_title`, `content`, `created_at`, `updated_at`) VALUES
(3, '1603013280.jpg', '<p>Getting a loan is now&nbsp;<br />\r\neasier and quicker with</p>', '<p>Anyday Money</p>', NULL, 'Quick & Easy Loan application process,No repayment or foreclosure charges,Direct disbursement to bank account', '2020-10-18 03:58:00', '2020-10-18 03:58:00'),
(4, '1603013379.jpg', '<p>Personal Loans</p>', '<p>Mid-month cash crunch</p>', '<p>No more problem now with AnyDay Money Loans</p>', 'No more problem  now with  AnyDay Money Loans,Quick & Easy Loan application process,Direct disbursement to bank account', '2020-10-18 03:59:39', '2020-10-18 03:59:39'),
(5, '1603013509.jpg', '<p>Business Loans</p>', '<p>Need funds to manage&nbsp;<br />\r\nand grow your business?</p>', '<p>Apply for quick business loans</p>', 'Quick & Easy Loan application process,No repayment or foreclosure charges,Direct disbursement to bank account', '2020-10-18 04:01:49', '2020-10-18 04:01:49'),
(6, '1603013739.jpg', '<p>Medical Loans</p>', '<p>Sudden medical emergencies?</p>', '<p>Take care of your loved ones while we<br />\r\ntake care of your financial worries</p>', 'Quick & Easy Loan application process,No repayment or foreclosure charges,Direct disbursement to bank account', '2020-10-18 04:05:39', '2020-10-18 05:55:21'),
(7, '1603013835.jpg', '<p>Education Loans</p>', '<p>Enabling higher education<br />\r\nto meet your life goals</p>', NULL, 'Quick & Easy Loan application process,No repayment or foreclosure charges,Direct disbursement to bank account', '2020-10-18 04:07:15', '2020-10-18 04:07:15');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `meta_key` text NOT NULL,
  `meta_value` text NOT NULL,
  `type` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `meta_key`, `meta_value`, `type`, `created_at`, `updated_at`) VALUES
(1, 'title', 'Overview', 'about-us', '2020-10-03 01:10:10', '2020-10-03 08:56:03'),
(2, 'sub_title', 'About Us', 'about-us', '2020-10-03 01:10:11', '2020-10-03 08:56:03'),
(3, 'main_content', '<p>offers short-term loans to meet the urgent financial needs of individuals and businesses by offering various types of unsecured loans in the form of Personal Loans, Business Loans, Medical Loans and Education Loans.</p>\r\n\r\n<p>This is done by using a state-of-the-art digital lending platform that facilities an easy, quick and transparent process right from the loan application stage to the final disbursal stage.</p>\r\n\r\n<p>AnyDay Money unsecured loan helps customers who face a challenge in obtaining quick loans from traditional sources such as Banks and NBFCs due to multiple reasons, viz. new to credit, lower credit scores, emergency requirement of funds, inability to visit a bank branch in person, unable to provide collateral.</p>', 'about-us', '2020-10-03 01:10:11', '2020-10-03 05:58:54'),
(4, 'anyday_money_title', 'AnyDay Money', 'about-us', '2020-10-03 01:10:11', '2020-10-03 02:12:56'),
(5, 'anyday_money_sub_title', 'Offering Hassle Free Loans', 'about-us', '2020-10-03 01:10:11', '2020-10-03 02:20:16'),
(6, 'title', 'Partner with Us', 'partner-with-us', '2020-10-03 05:59:15', '2020-10-03 05:59:15'),
(7, 'main_content', '<p>Together we can look forward to new business opportunities and unlock growth beyond borders.<br />\r\nIn case you wish to associate with us for mutually beneficial relationship, kindly fill in your details below :</p>', 'partner-with-us', '2020-10-03 05:59:15', '2020-10-03 05:59:15'),
(8, 'form_title_first', 'Send us', 'partner-with-us', '2020-10-03 06:02:13', '2020-10-03 06:02:13'),
(9, 'form_title_second', 'your Inquiry', 'partner-with-us', '2020-10-03 06:02:13', '2020-10-03 06:02:13'),
(10, 'title', 'Terms and Conditions', 'terms-and-condition', '2020-10-03 06:08:13', '2020-10-03 06:08:13'),
(11, 'main_content', '<p>Please read these terms and conditions carefully as these forms a legal agreement between The Lending Partner (hereinafter referred to as the Company) and you. The Company is a non-banking financial company/Bank which would review, approve and disburse the loan requested by you under the AnyDay Money application (&acirc;&euro;&oelig;Loan&acirc;&euro;) as per the terms and conditions of the loan agreement to be entered into between you and the Company (&acirc;&euro;&oelig;Loan Agreement&acirc;&euro;).</p>\r\n\r\n<p>When you click on &acirc;&euro;&tilde;I agree&acirc;&euro;&trade; or download, install or use our services, you agree to accept the terms and conditions contained herein.</p>\r\n\r\n<h3>APPLICATION FOR THE LOAN</h3>\r\n\r\n<p>Through the &acirc;&euro;&tilde;AnyDay Money Application&acirc;&euro;&trade;, you may apply for the loan, subject to the fulfilment of the eligibility criteria laid down in the AnyDay Money Application by the Company. You understand that the Company is authorised to collect, authenticate, verify and confirm the user data, Personal Information (as defined below), documents and details as may be required by the Company to sanction the loan.</p>\r\n\r\n<h3>PERSONAL INFORMATION OF THE USER</h3>\r\n\r\n<p>During the application process, you shall be required to share and upload the user data on the on the AnyDay Money (&acirc;&euro;&oelig;App&acirc;&euro;) or on the web-based platform of the Company (&acirc;&euro;&oelig;Website&acirc;&euro;) (hereinafter collectively referred to as the &acirc;&euro;&oelig;Platform&acirc;&euro;). User data shall include personal information including but not limited to your name, e-mail address, gender, date of birth, mobile number, photograph, mobile phone information including contact numbers, SMS, salary data and financial information such as bank documents, salary slips, bank statements, PAN card, bank account number, and other relevant details (&acirc;&euro;&oelig;Personal Information&acirc;&euro;).</p>\r\n\r\n<p>You agree that the Personal Information shall always be accurate, correct and complete. As part of the services, you authorize us to import your details and Personal Information to be verified from NSDL/UIDAI or equivalent KYC authorising institution. You understand and acknowledge that we may periodically request for updates on such Personal Information and we may receive such updated information from such platforms/institutions.</p>\r\n\r\n<h3>USER DATA VERIFICATION AND SANCTIONING OF THE LOAN</h3>\r\n\r\n<p>All transactions undertaken on your behalf by the Company will be based on your express consent and will be strictly on a non-discretionary basis. You also authorise the Company to get your credit information report from one or more Credit Information Companies as decided by the Company from time to time. Once you verify and upload the Personal Information and/or other documents</p>\r\n\r\n<p>relating thereto and any other details on the Platform, the Company shall be authorized to process the same. As a part of the application process, you are required to fill and upload all the documents as may be required by the Company. Upon the completion of the document verification by the Company, the Loan may be sanctioned by the Company to you, subject to fulfilment of the eligibility criteria and other such conditions set forth by the Company for sanctioning of the Loan. The Company may collect physical documents including signatures on those documents, if required for sanctioning and processing the Loan.</p>\r\n\r\n<p>The sanctioned Loan shall be disbursed as per the mode provided in the AnyDay Money Application and/or the Loan Agreement. You are required to repay the Outstanding balance as defined in the Loan Agreement to the Company on the respective due date(s) mentioned in the application form available on the Platform.</p>\r\n\r\n<h3>LOAN/ CREDIT FACILITY</h3>\r\n\r\n<p>AnyDay Money also facilitates loans and advances and offers various types of loan credit facility to You through AFPL Platforms (&acirc;&euro;&oelig;Loan&acirc;&euro;). You acknowledge that Your eligibility for the Loan including the terms and quantum of the Loan shall be at the sole discretion of the Company.</p>\r\n\r\n<p>To apply for a Loan offered to you by the AFPL Platform, you are required to accept the offer and fill in a loan application provided on that Platform. Depending upon the relevant credit checks and on completion of mandatory KYC procedures, You may be able to select your preferred Loan amount and EMI plan including its tenure. Further, you may be required to provide certain personal information including but not limited to your name, address, phone number, IP address, the loan amount, tenure and Equated Monthly Instalments (&acirc;&euro;&oelig;EMI&acirc;&euro;) plan selected by You, the purpose of the loan, and such other information that may be required by the Company. You are responsible to ensure that your KYC details with the Company are current and accurate at the time of applying for the Loan on the Company Platforms.</p>\r\n\r\n<p>You understand and agree that the terms of Loan shall be governed by the specific loan agreements executed between You and that the Company specifically.</p>\r\n\r\n<p>You understand that a service fee may be charged for instant processing of the Loan and stamp duty charges, which will be specified to you in the loan application and deducted from the Loan amount. You are responsible to ensure that you understand all the terms in the loan agreement and carefully review the same including interest rate, EMI plan and other charges of the Loan prior to completing and submitting the application. Please ensure that you review and confirm all information in relation to the Loan, provided either by You or the Company while applying for the Loan. Please note that the final amounts of EMI, service fees and stamp duty as may be applicable, are determined by THE COMPANY. On approval and completion of all procedure in relation to the Loan, you may credit the Loan amount into Your account. Further, You agree that THE COMPANY may send you communications regarding the Loan including reminders to pay Your EMI through the THE COMPANY Platform. Upon EMI due date, the EMI payment amount will be directly debited by THE COMPANY from your account held with them. You are responsible for maintaining sufficient funds in your account, and for any penal consequences that result from the performance of the loan agreement or insufficiency of funds to meet the EMI requirements including the levy of interest as per the terms of the loan agreement executed by You with THE COMPANY.</p>\r\n\r\n<p>By availing of the Loan Facility Services on THE COMPANY Platform, You expressly authorize the Platform to access, use and store Loan transaction information on an ongoing basis, on Your behalf for the purpose of providing you with services on the COMPANY Platform.</p>\r\n\r\n<h3>SERVICE PROVIDERS</h3>\r\n\r\n<p>AnyDay Fintech Private Limited (formerly known as Poonawalla Jet Fintech Private Limited) (AFPL) is the technology partner to the Company (&acirc;&euro;&oelig;Tech Partner&acirc;&euro;). The Platform shall be maintained by the Tech Partner as per its agreement with the Company.</p>\r\n\r\n<p>Further the Company may also engage with other vendors and service providers to perform functions and provide services to the Company, such as technical infrastructure services, analysing usage of such services, providing analytics and measurement reports (which reports the Company may share with the Tech Partner and its other partners) providing customer service, facilitating payments or conducting surveys. We may share your private Personal Information with such service providers subject to obligations consistent with these Terms and Conditions and Privacy Policy and any other appropriate confidentiality and security measures, and on the condition that the third parties use your private personal data only on the Company&acirc;&euro;&trade;s behalf and pursuant to the Company&acirc;&euro;&trade;s instructions</p>\r\n\r\n<h3>NO LIABILITY OF THE COMPANY</h3>\r\n\r\n<p>You understand and acknowledge that you shall be solely responsible for all the activities that occur under your user account while availing the services. You undertake that the Company shall not be responsible and liable for any claims, damages, disputes arising out of use or misuse of the services. By usage of the services, you shall be solely responsible for maintaining the confidentiality of the user account and for all other related activities under your user account. The Company reserves the right to accept or reject your registration for the services without obligation of explanation.</p>\r\n\r\n<p>You acknowledge that the content available on the Platform is being accepted by you after the terms on which this is being offered have been understood and accepted by you. You further acknowledge that you are solely responsible for the capability of the electronic devices and the internet connection, you chose to run on the Platform. The accessibility to the Platform may be subject to availability of hardware, software specifications, internet connection and other features and specifications, required from time to time. The Company expressly disclaims any responsibility for any loss, injury, liability or damage of any kind resulting from and arising out of your use of the Platform.</p>\r\n\r\n<h3>NO WARRANTY</h3>\r\n\r\n<p>Although the Company has made the required efforts to ensure that the information provided on the Platform is reasonably accurate, however, the Company does not warrant its accuracy,</p>\r\n\r\n<p>completeness or suitability, correctness, adequacy, validity, whatsoever for any purpose. As such database provided is without any warranty, express or implied, as to their legal effect.</p>\r\n\r\n<p>Use of any information on the Company&acirc;&euro;&trade;s Platform shall be at your own risk. All information should be used in accordance with the applicable laws. The Company does not undertake any kind of liability whatsoever for the same.</p>\r\n\r\n<p>In case of any transaction is not in agreement with your record or with the information that you have, you are requested to write to the Company on support@anydaymoney.com</p>\r\n\r\n<p>The Company expressly disclaims to the maximum limit permissible by law, all warranties, express or implied, including, but not limited to implied warranties of merchantability, fitness for a particular purpose and non-infringement</p>\r\n\r\n<h3>RESTRICTIONS</h3>\r\n\r\n<p>You expressly agree that this Platform will not be used for committing any fraud, embezzlement, money laundering, or for any unlawful and/or illegal purposes. You will not reproduce, duplicate, copy, sell, resell or exploit any portion of the Platform. You will not post, upload, email, transmit any content that is unlawful, harmful, threatening, abusive, harassing, torturous, defamatory, vulgar, obscene, libellous, contains software viruses, destroy or limit functionality of any software, invasive of another&acirc;&euro;&trade;s privacy, hateful, or racially, ethnically or otherwise objectionable through the Platform. You will not use this platform to cause harm or injury to any third party or impersonate any person or entity, on the Platform</p>\r\n\r\n<h3>You further agree not to:</h3>\r\n\r\n<ul>\r\n	<li>Upload, post, email, transmit or otherwise make available any content that you do not have a right to make available under any law or under contractual or fiduciary relationships (such as inside information, proprietary and confidential information learned or disclosed as part of employment relationships or under nondisclosure agreements);</li>\r\n	<li>upload, post, email, transmit or otherwise make available on the Platform, any content that infringes any patent, trademark, trade secret, copyright or other proprietary rights of any party;</li>\r\n	<li>interfere with or disrupt the Platform or servers or networks connected to the Platform, or disobey any requirements, procedures, policies or regulations of networks connected to the Platform;</li>\r\n	<li>You expressly agree not to intentionally or unintentionally violate any applicable local, state, national or international laws and any regulations having the force of law</li>\r\n</ul>\r\n\r\n<h3>BILL PAYMENTS AND DIGITAL PRODUCTS TERMS &amp; CONDITIONS</h3>\r\n\r\n<p>Please read the following terms and conditions carefully before accessing, browsing, downloading, registering or using the website www.anydaymoney.com, or the AnyDay Money mobile application (AFPL Platform) used as a sourcing mechanism for The Lending Partner (hereinafter called THE COMPANY or Company), on any device and/or before availing any travel, recharge or bill payment or digital products related services offered by THE COMPANY on the AnyDay Fintech Private Limited (formerly known as Poonawalla Jet Fintech Private Limited) Platform (hereinafter called AFPL Digital Services).</p>\r\n\r\n<p>You and AFPL shall herein be jointly referred to as &acirc;&euro;&oelig;Parties&acirc;&euro;.</p>\r\n\r\n<h3>ELIGIBILITY FOR AVAILING AFPL DIGITAL SERVICES</h3>\r\n\r\n<p>The AFPL Digital Services are not available to persons under the age of 18 or to anyone previously suspended or removed by AFPL from availing the AFPL Digital Services or accessing the AFPL Platform. By accepting the T&amp;Cs or by otherwise using the COMPANY Digital Services on the COMPANY Platform, You represent that You are at least 18 years of age and have not been previously suspended or removed by AFPL, or disqualified for any other reason, from availing the AFPL Digital Services or using the AFPL Platform. In addition, You represent and warrant that You have the right, authority and capacity to enter into this Agreement and to abide by all the T&amp;Cs as part of this Agreement. Finally, You shall not impersonate any person or entity, or falsely state or otherwise misrepresent Your identity, age or affiliation with any person or entity. Finally, in the event of any violation of the T&amp;Cs, AFPL reserves the right to suspend or permanently prevent You from availing AFPL Digital Services or using the AFPL Platform.</p>\r\n\r\n<h3>AFPL DIGITAL SERVICES</h3>\r\n\r\n<p>AFPL is engaged with certain Billers supported by the AFPL Platforms for facilitating payment services through biller aggregator(s), through whom You can initiate bill payment on a AFPL Platform, further AFPL facilitates the payment of certain bills through the AFPL Platform with respect to certain services offered by such third-party billing aggregators who have partnered with AFPL to enable payment traction processes through the AFPL Platform (&acirc;&euro;&oelig;AFPL Business Partners&acirc;&euro;). Further, AFPL also offers certain digital products which facilitate the purchase of prepaid recharges for mobile, DTH, purchase of movie tickets, bus tickets, flight tickets etc. All these services described hereinabove are herein referred to as &acirc;&euro;&oelig;Services&acirc;&euro; or &acirc;&euro;&oelig;AFPL Digital Services&acirc;&euro;. On accessing, downloading or and by availing the AFPL Digital Services, you agree to comply with and be bound by the terms and conditions as set out herein. The terms &acirc;&euro;&tilde;Agreement&acirc;&euro;&trade; or &acirc;&euro;&tilde;T&amp;Cs&acirc;&euro;&trade; mentioned herein below includes the terms and conditions in relation to bill payments and digital products in relation to AFPL Services and/ or AFPL Platform.</p>\r\n\r\n<p>The payment transactions or any communication/offers carried out in lieu of the Services are solely between the sender and recipient of the payment, and AFPL does not receive the funds pertaining to the payment transaction or play a role in the settlement of such payment transaction.</p>\r\n\r\n<h3>You understand and agree to the following:</h3>\r\n\r\n<ul>\r\n	<li>AFPL provides the Service as a facilitator of payment transactions, and AFPL is not a party to these transactions.</li>\r\n	<li>AFPL Service or AFPL Platform does not constitute being a bank, financial institution, card associations, and other payment system providers defined under the Payment and Settlement Systems Act, 2007.</li>\r\n	<li>AFPL is not responsible to you in any manner whatsoever, with respect to settlement of payment relating to the transaction facilitated through the Service.</li>\r\n	<li>AFPL is not and will not be responsible for any aspect of the products or services You purchase.</li>\r\n	<li>AFPL is not and will not be responsible for any communications made by You or any communication or offers made to you through the AFPL Platforms.</li>\r\n	<li>AFPL is not a party to and will not be responsible for any disputes, chargebacks or reversals arising pursuant to payment transactions.</li>\r\n	<li>AFPL is not responsible for any act of Users, including, non-completion of a transaction.</li>\r\n	<li>The facilitation of a transaction does not guarantee that you have sufficient funds available in the account he or she used, that the transaction will be authorized or processed, or that the transaction will not later result in a chargeback or other reversal.</li>\r\n	<li>AFPL uses AFPL Business Partners&acirc;&euro;&trade; and Biller&acirc;&euro;&trade;s services to process Your payment instructions, and hence You consent and agree to comply with the rules, guidelines, directions, instructions, requests, etc. issued by the respective AFPL Business Partners and Billers from time to time (&quot;Participant Rules&quot;).</li>\r\n	<li>You acknowledge and agree that You are responsible for keeping yourself up-to-date and complying with all Participation Rules and the failure to comply with the obligations so imposed on You, may result in suspension or termination of Your use of the AFPL Service or AFPL Platform. For the avoidance of doubt, the Participant Rules are between You and the respective AFPL Business Partner or Biller and AFPL is not liable for any actions or inactions thereof.</li>\r\n</ul>\r\n\r\n<h3>BILL PAYMENTS</h3>\r\n\r\n<p>In order to use the bill payments service or any other AFPL Service, You will need to obtain access to the World Wide Web or the Internet, either on a computer or on any other device that can access web-based content, and You will also need to pay any service fees associated with such access. In addition, you must have all equipment necessary to make such connection to the World Wide Web or the Internet, including a computer and a modem or any other set of access devices. AFPL and/or any AFPL Business Partner reserve the right to charge and recover from You, such fees for availing the AFPL Service, as the case may be. These charges shall be effective from the time when they are posted on the AFPL Platform or on the AFPL Business Partner&acirc;&euro;&trade;s channel/portal/website through which You are availing the specific Service.</p>\r\n\r\n<p>You are bound by such revisions and should therefore visit the AFPL Platform or check with the AFPL Business Partner&acirc;&euro;&trade;s channel/portal/website through which You are availing the specific service in order to review the applicable fees which may vary from time to time.</p>\r\n\r\n<p>In the event that You stop or seek a reversal of the payment instructions as may have been submitted, AFPL shall be entitled to charge and recover from You and You shall be liable to pay such charges to AFPL or the AFPL Business Partner, as may be decided by AFPL. These charges shall be charged on to Your designated payment account or in any other manner as may be decided by AFPL.</p>\r\n\r\n<p>AFPL offers a convenient and secure way to make payments towards Identified Biller(s) Depending upon the AFPL Business Partner through whom the specific service is availed by You</p>\r\n\r\n<p>the specific features of the service may differ;</p>\r\n\r\n<p>the number of Billers available over the service may differ;</p>\r\n\r\n<p>the type and range of payment accounts that can be used to issue a payment instruction may differ;</p>\r\n\r\n<p>the modes/devices over which the service can be accessed may differ; and</p>\r\n\r\n<p>the charges, fees for availing the service or any aspect of the Service may differ. Specific details related to these aspects would be available with the AFPL Business Partner on their channel/portal/website over which the service is being availed.</p>\r\n\r\n<p>From time to time, AFPL, at its sole discretion, can add to or delete from such list of Billers or types of payment accounts that can be used in respect of making payments to a Biller. The type and range of payment accounts that can be used for making payments may differ for each Biller depending on Biller specifications. There may be additional fees/charge when using certain types of payment accounts in respect of a Biller. The terms upon which a payment can be made to a biller can differ depending on whether a card or a bank account is used to issue the payment instruction.</p>\r\n\r\n<p>Further, depending on the specific facilities allowed by a AFPL Business Partner, payments to a Biller can be made either (a) by issuing a payment instruction for an online debit/charge to a payment account or (b) by scheduling an automated debit to a payment account. In using the Service, you agree to:</p>\r\n\r\n<p>provide true, accurate, current and complete information about Yourself (&acirc;&euro;&oelig;Registration Data&acirc;&euro;), Your payment account details (&acirc;&euro;&oelig;Payment Data&acirc;&euro;), Your Biller details (&acirc;&euro;&oelig;Biller Data&acirc;&euro;); and maintain and promptly update the Registration Data, Payment Data and Biller Data to keep it true, accurate, current and complete at all times. If You provide any information that is untrue, inaccurate, not current or incomplete, or AFPL has reasonable grounds to suspect that such information is untrue, inaccurate, not current or incomplete, AFPL has the right to suspend or terminate Your account and refuse any and all current or future use of the AFPL Services/THE COMPANY Platform (or any portion thereof). The term Biller means a billing partner including telecom operators which have partnered with AFPL or AFPL Business Partners to facilitate the bill payment Services supported by AFPL Platform.</p>\r\n\r\n<p>AFPL assumes no responsibility and shall incur no liability if it is unable to affect any payment instruction(s) on the payment date owing to any one or more of the following circumstances: If the payment instruction(s) issued by You is/are incomplete, inaccurate, invalid and delayed; If the payment account has insufficient funds/limits to cover for the amount as mentioned in the payment instruction(s);</p>\r\n\r\n<p>If the funds available in the payment account are under any encumbrance or charge; If Your bank or the National Clearing Centre refuses or delays honouring the payment instruction(s); If payment is not processed by biller upon receipt;</p>\r\n\r\n<p>Circumstances beyond the control of AFPL (including, but not limited to, fire, flood, natural disasters, bank strikes, power failure, systems failure like computer or telephone lines breakdown due to an unforeseeable cause or interference from an outside force).</p>\r\n\r\n<p>In case the bill payment is not effected for any reason, You will be intimated about the failed payment by an e-mail.</p>\r\n\r\n<h3>MOBILE RECHARGES</h3>\r\n\r\n<p>AFPL is only a reseller of digital products. AFPL does not provide mobile operator services and is only a reseller of prepaid mobile recharge services which are ultimately provided by telecommunications service providers (hereafter Telco or Telcos) or by other distributors or aggregators of such Telcos. AFPL is not a warrantor, insurer, or guarantor of the services to be provided by the Telcos. Prepaid mobile recharge sold to You by use of AFPL Service is sold without recourse against THE COMPANY for any breach of contract by the Telcos. Any disputes regarding the quality, minutes provided, cost, expiration, or other terms of the mobile prepaid recharge purchased must be handled directly between You (or the recipient of the recharge) and the Telco. For avoidance of doubt, the Telco terms are between you and the applicable Telco, not AFPL and AFPL shall not not liable for any actions or inactions of such Third Party Providers.</p>\r\n\r\n<p>The terms and conditions set out in this section are applicable, mutatis mutandis, to other prepaid recharge products available on the AFPL Platform including prepaid recharges in relation to DTH, as well as to other prepaid recharge products that may be offered on the AFPL Platform. AFPL will not be responsible for any failure on the part of any of its recharge partners in effecting a recharge.</p>\r\n\r\n<h3>MOVIE TICKETS</h3>\r\n\r\n<p>AFPL is an intermediary within the meaning of the Information Technology Act, 2000 and the rules thereunder and merely facilitates the sale and purchase of movie tickets between the Merchant, i.e., the cinema owner, and You. For the purposes of this section, a Merchant shall mean a cinema owner or the person owning inventory of movie tickets that are being sold on the AFPL Platform. AFPL does NOT at any point of time during any transaction between You and the Merchant, take the ownership of any of the products/services provided by Merchant. Nor does AFPL at any point assert any rights or claims over the products/services offered by the Merchant to You. In using the AFPL Platform for purchasing movie tickets, You explicitly agree and acknowledge that:</p>\r\n\r\n<p>Bookings for the tickets once made by You cannot be cancelled, exchanged or refunded;</p>\r\n\r\n<p>Your booking confirmation will be sent via an e mail and/or SMS;</p>\r\n\r\n<p>You or the person collecting the ticket(s) on Your behalf may need to print and present the e mail ticket at the counter in order to avail a physical ticket from the cinema box office of the Merchant at the premises of the cinema hall concerned;</p>\r\n\r\n<p>To collect the tickets from the cinema box office, it is mandatory for You or the person collecting the ticket(s) on Your behalf to present the debit/credit card that has been used to book ticket(s) along with the booking confirmation SMS or e mail print out; The holder of a physical ticket is deemed to be the owner of the ticket(s);</p>\r\n\r\n<p>A convenience fee per booking in respect of the ticket(s) is levied on all tickets booked by You online. Kindly check once before You make the booking;</p>\r\n\r\n<p>As per the Merchant&acirc;&euro;&trade;s terms and conditions, You need to make the bookings for the tickets in respect of the children above the age of 3 years;</p>\r\n\r\n<p>As per the Merchant&acirc;&euro;&trade;s terms and conditions, in case a physical ticket is lost or misplaced, a duplicate ticket cannot be issued;</p>\r\n\r\n<p>If the Merchant cancels the show, AFPL will NOT be held responsible for such cancellation. In such cases, AFPL will automatically issue a refund to Your AFPL wallet with applicable deductions the amount paid by You for the movie ticket(s) booked on AFPL within 48 hours of the cancellation; If You do not receive a confirmation number (in the form of a confirmation SMS or e mail) after submitting payment information, or if You receive an error message or service interruption after submitting payment information, You should immediately report to the THE COMPANY customer care. THE COMPANY will NOT be responsible for any losses occurred in the process;</p>\r\n\r\n<p>Please add support@anydaymoney.com to Your address book to ensure e mail delivery in Your inbox. AFPL will not be responsible for any loss caused due to the confirmation e-mail or any other e-mail relating to the ticket booking process not being delivered to Your primary inbox; By booking a ticket on the AFPL Platform, You agree and undertake to adhere to and comply with the terms and conditions of respective Merchants in respect of all the bookings made by You for the tickets through the THE COMPANY Platform;</p>\r\n\r\n<p>As per the Merchant&acirc;&euro;&trade;s terms and conditions, outside food and beverages are not allowed inside the cinema hall&acirc;&euro;&trade;s premises;</p>\r\n\r\n<p>By accepting the T&amp;Cs, including the specific terms and conditions in this section, You accept that AFPL may send the alerts to the mobile phone number/e mail provided by You while registering on the THE COMPANY Platform or to any such number replaced and informed by You subsequently; Notwithstanding anything to the contrary contained herein, neither AFPL nor affiliates of AFPL or its officers, directors, employees shall have any liability to You or to any third party for any direct, indirect, incidental, special or consequential damages or any loss of revenue or profits arising under or relating to the T&amp;Cs, the AFPL Platform or AFPL Services, even if any of said parties had been advised of, knew of, or should have known of, the possibility of such damages. To the maximum extent permitted by law, AFPL&acirc;&euro;&trade;s maximum aggregate liability to You for any causes whatsoever, and regardless of the form of action (whether liability arises due to negligence or any other tort, breach of contract, violation of statute, misrepresentation or for any other reason), will at all times be limited to Rs. 5,000. To the maximum extent permitted by law, You waive, release, discharge and hold harmless THE COMPANY or affiliates of THE COMPANY, and each of their directors, officers, employees, and agents, from any and all claims, losses, damages, liabilities, expenses and causes of action arising out of Your use of the AFPL Platform and/or AFPL Service.</p>\r\n\r\n<p>Ticket(s) booked with cancellation protect can be cancelled upto 3 hours before the show time e.g. If you have booked tickets for show time Sunday 7 PM, you can cancel the tickets upto 3:59 PM on that Sunday.</p>\r\n\r\n<p>In case you cancel your ticket within the cancellation period, you will receive 100% refund on ticket price e.g. If you have booked tickets for show time Sunday 7 PM and you cancel the ticket(s) anytime before 3:59 PM on that Sunday, you will get 100% refund in your THE COMPANY Wallet within 24 hours of canceling the ticket.</p>\r\n\r\n<p>Your ticket(s) will be sent to you over sms/e-mail only after the cancellation period is over e.g. if your movie&acirc;&euro;&trade;s show time is Sunday 7 PM, you will receive your ticket details after 4 PM on that Sunday.</p>\r\n\r\n<p>Refund will only be given for the movie ticket amount, any additional amount paid for convenience fee or food and beverages will not be refunded. On cancellation of the ticket, the cinema operator reserves the right to allow or disallow redemption of the food item in the order. Partial cancellation of an order is not allowed.</p>\r\n\r\n<p>All seat layouts are representative in nature, distance between rows &amp; from screen can differ from the actual.</p>\r\n\r\n<p>In case of any issues, the interpretation of THE COMPANY will be considered final.</p>\r\n\r\n<h3>DISPUTE RESOLUTION</h3>\r\n\r\n<p>If any dispute, controversy or claim arises under this Agreement or in relation to any THE COMPANY Service or the THE COMPANY Platform, including any question regarding the existence, validity or termination of this Agreement or T&amp;Cs (hereinafter Dispute), the Parties shall use all reasonable endeavours to resolve such Dispute amicably. If the Parties are unable to resolve the Dispute amicably within 30 days of the notice of such Dispute, THE COMPANY may elect to resolve any Dispute by a binding arbitration in accordance with the provisions of the Indian Arbitration &amp; Conciliation Act, 1996 (hereinafter Act). Such Dispute shall be arbitrated on an individual basis and shall not be consolidated in any arbitration with any claim or controversy of any other party.</p>\r\n\r\n<p>The Dispute shall be resolved by a sole arbitrator, appointed in accordance with the Act. The seat of the arbitration shall be Pune and the language of this arbitration shall be English. Either You or THE COMPANY may seek any interim or preliminary relief from a court of competent jurisdiction in Pune necessary to protect the rights or the property belonging to You or THE COMPANY (or any of our agents, suppliers, and subcontractors), pending the completion of arbitration. Any arbitration shall be confidential, and neither You nor THE COMPANY may disclose the existence, content or results of any arbitration, except as may be required by law or for purposes of enforcing the arbitration award. All administrative fees and expenses of arbitration will be divided equally between You and THE COMPANY. In all arbitrations, each party will bear the expense of its own lawyers and preparation. This paragraph shall survive termination of this Agreement.</p>\r\n\r\n<h3>GOVERNING LAW AND FORUM FOR DISPUTES</h3>\r\n\r\n<p>Subject to the Dispute Resolution section above, You agree that any claim or dispute You may have against THE COMPANY must be resolved by a court having jurisdiction in Pune, India. You agree to submit to the personal jurisdiction of the courts located within Pune, India, for the purpose of litigating all such claims or disputes. This Agreement shall be governed by Indian law. This paragraph shall survive termination of this Agreement.</p>\r\n\r\n<h3>OTHER TERMS AND CONDITIONS</h3>\r\n\r\n<p>It will be the sole responsibility of the user to ensure that the username and the password are kept confidential and not disclosed to any third party, including any representative or agent of the Company. The user shall take all possible care to prevent discovery of username or password by any person.</p>\r\n\r\n<p>The Company makes no representations about the timelessness of the services contained on the Platform for any purpose whatsoever.</p>\r\n\r\n<p>The Company shall not be responsible if any information/statement/page contained therein is printed/downloaded from the Company&acirc;&euro;&trade;s site and after printing/downloading complete/partial, text/information is altered/removed/obscured.</p>\r\n\r\n<p>The Company, at no event, be liable/responsible for any direct, indirect, punitive, incidental, special, consequential damages or any damages whatsoever including but not limited to damages for loss of use, data or profits, arising out of or in any way connected with the use of the Company&acirc;&euro;&trade;s Platform</p>\r\n\r\n<p>The Company, at no event, be liable/responsible for any direct, indirect, punitive, incidental, special, consequential damages or any damages for the delay or inability to use the Company&acirc;&euro;&trade;s Platform , or failure to provide services or for any information, date, statement, certificate, software and any other services obtained through the Company&acirc;&euro;&trade;s Platform or otherwise arising out of the use of the Company&acirc;&euro;&trade;s Platform</p>\r\n\r\n<p>Certain services, such as accounting information depends on continuous connection to the Company&acirc;&euro;&trade;s database. The Company makes no assurance, representation, promise whatsoever that such connectivity will always be available.</p>\r\n\r\n<p>The Company reserves the right to suspend these services if in the Company&acirc;&euro;&trade;s opinion security of the site or of the data could be compromised.</p>\r\n\r\n<p>The Company may also suspend services on the Platform for any customer at its sole discretion without assigning any reason whatsoever. In such an event, you shall contact the Company&acirc;&euro;&trade;s office for any clarification.</p>', 'terms-and-condition', '2020-10-03 06:08:14', '2020-10-17 11:29:50'),
(12, 'title', 'Privacy Policy', 'privacy-policy', '2020-10-03 06:23:53', '2020-10-03 06:23:53');
INSERT INTO `pages` (`id`, `meta_key`, `meta_value`, `type`, `created_at`, `updated_at`) VALUES
(13, 'main_content', '<p>Thank you for visiting AnyDay Fintech Private Limited. AnyDay Fintech Private Limited (&ldquo;AFPL&rdquo;) (us, we, our, Company or AFPL) is the author and publisher of the internet resource www.anydaymoney.com (&ldquo;Website&rdquo;) on the World Wide Web as well as the software and applications provided by AFPL, including but not limited to the software and applications on the Website.</p>\r\n\r\n<p>We respect the privacy of everyone who visits this Website. The confidentiality and protection of your sensitive personal information is important to us. This Privacy Policy tells you how we collect and use personal information collected by us. Please read this Privacy Policy before using the Website or submitting any sensitive personal information or data.</p>\r\n\r\n<p>All rights are reserved by the Company. The content, code and applications contained on this Website, under the domain www.anydaymoney.com are copyright protected. Website visitors may not reproduce, copy, or redistribute content or code in any form without prior written permission from the Company except for purely personal and non-commercial uses as per the Terms of Use displayed on the Website and App.</p>\r\n\r\n<p>Once you have accessed this website and have started to make use of the site, it means that you explicitly agree with all the terms that were described in the Privacy Policy, as well as the other terms and conditions on the website.</p>\r\n\r\n<h3>TELEPHONE CONTACT:</h3>\r\n\r\n<p>Notwithstanding your registration with &#39;do not disturb&#39; or &#39;do no call&#39; services, by sharing your telephone contact number on the Website you are authorizing AFPL, its representatives, its partners, NBFCs and financial institutions and their representatives, to get in touch with you by giving you a promotional call and offer you their services and products offered by AFPL.</p>\r\n\r\n<h3>COLLECTION OF INFORMATION:</h3>\r\n\r\n<p>AFPL, its officers, employees and agents (if appointed) are required to collect certain information (which may include sensitive personal information) from you to assist us in our relationship with you.) If you are unable to provide the information we need, we may not be able to provide you with the product or service you have requested. The types of information collected can include:</p>\r\n\r\n<h3>1. PERSONAL INFORMATION</h3>\r\n\r\n<p>At times we may request that you supply us with personal information. Generally, this information is requested when you want us to provide you with information or a service. We may gather the following information:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Name</li>\r\n	<li>Address</li>\r\n	<li>Email address</li>\r\n	<li>Mobile phone number/ telephone number</li>\r\n	<li>Date of birth</li>\r\n	<li>Gender</li>\r\n	<li>Qualification</li>\r\n	<li>Permanent Account Number/Passport Number/Voter ID Number</li>\r\n	<li>Current profession/employment</li>\r\n	<li>Name and type of entity</li>\r\n	<li>Residential status</li>\r\n	<li>Nature of business</li>\r\n	<li>Industry type</li>\r\n	<li>Property location</li>\r\n	<li>Property type</li>\r\n	<li>Estimated market value of the property</li>\r\n	<li>Profitability of the entity</li>\r\n	<li>Turnover of the entity</li>\r\n	<li>Information on whether income tax returns are filed or not</li>\r\n	<li>Information on existing borrowings from any bank</li>\r\n	<li>Name of the employer</li>\r\n	<li>Information of the Salary account</li>\r\n	<li>Net take home salary</li>\r\n	<li>Total work experience</li>\r\n	<li>Experience in current employment</li>\r\n	<li>Information on ownership of any office/residence premises</li>\r\n	<li>Bank statements</li>\r\n	<li>Credit reports- You hereby consent to pull your credit report from PCPL.</li>\r\n	<li>Market place in which the products are sold</li>\r\n	<li>Product category</li>\r\n	<li>Profession type</li>\r\n	<li>Professional receipts</li>\r\n	<li>Information on depreciation deducted by the entity</li>\r\n	<li>Information on interest paid to partners / directors</li>\r\n	<li>IP address, a unique identifier for your computer, cellular phones, tablets, or such other device (&quot;Devices&quot;)</li>\r\n	<li>Information which relates to your financial affairs, business, employment, income, or assets Address of place where your documents may be collected</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Information which would help AFPL determine your eligibility to avail the products and services offered</p>\r\n\r\n<p>Information which helps AFPL process applications made by you for particular products and services such as bank statement, income tax returns, pay slip, loan co-applicant&#39;s personal information (if applicable)</p>\r\n\r\n<p>Any personal information you may provide to us during any telephonic conversation or e-mail communication with our representatives or during document collection by our representative Any other information that AFPL is required to collect.</p>\r\n\r\n<p>Information that is freely available in the public domain or accessible under the Right to Information Act, 2005 or any other law will not be regarded as personal information or sensitive personal data or information.</p>\r\n\r\n<h3>2. NON-PERSONAL INFORMATION</h3>\r\n\r\n<p>At this Website, information sent by your web browser, may be automatically collected. This information typically includes the domain name (the site after the @ in your e-mail address). It may also contain your username (the name before the @ in your e-mail address). Other examples of information collected by our server include the Internet Protocol (IP) address used to connect the visitor&#39;s computer to the Internet, operating system and platform, the average time spent on our Website, pages viewed, information searched for, access times, Websites or applications visited before and after a visitor visits our Website, and other relevant statistics. The amount of information sent depends on the settings you have on your web browser. Please refer to your browser if you want to learn what information it sends.</p>\r\n\r\n<p>All such information will be used to assist us in providing an effective service on this Website. We may from time to time supply the owners or operators of third-party websites from which it is possible to link to our Website with information relating to the number of users linking to our Website from such third party websites.</p>\r\n\r\n<p>We also use the information which we automatically receive from your web browser to see which pages you visit within our Website, which websites you visited before coming to ours, and where you go after you leave. This is helpful to understand how our visitors use this Website. We use this information in the aggregate to measure the use of our Website and to administer and improve our Website. This statistical data is interpreted by the Company in its continuing effort to present the Website content that visitors are seeking in a format they find most helpful.</p>\r\n\r\n<p>When you use a Device to access our Website, we may access, collect, monitor, store on your Device, and/or remotely store one or more &quot;device identifiers.&quot; Device identifiers are small data files or similar data structures stored on or associated with your Device, which uniquely identify your Device. A device identifier may be data stored in connection with the device hardware, data stored in connection with the device&#39;s operating system or other software, or data sent to the device by us; and</p>\r\n\r\n<p>A device identifier may deliver information to us or to a third-party partner about how you browse and use the service and may help us or others provide reports or personalized content and ads. Some features of the Website may not function properly if use or availability of device identifiers is impaired or disabled.</p>\r\n\r\n<h3>USE OF YOUR INFORMATION</h3>\r\n\r\n<p>We collect and use your personal information in order:</p>\r\n\r\n<p>to provide information or interactive services through this Website to your e-mail address;</p>\r\n\r\n<p>to respond to the queries and/or process requests submitted by you and sharing your information with banks, financial institutions and other third parties, in relation to any of our services provided to you or any other information sought by you;</p>\r\n\r\n<p>to contact you in relation to any of our services offered on our Website;</p>\r\n\r\n<p>to process applications submitted by you through the online or offline process available on this Website, to avail any of the services provided by us;</p>\r\n\r\n<p>to improve our business operations and to communicate about our products, services and businesses;</p>\r\n\r\n<p>to provide information regarding our services and this Website, to your e-mail address or, where you wish it to be sent by post, to your name and postal address, to seek your feedback or to contact you in relation to those services offered on the our Website; and to process your requests on the Website and any possible later claims, to meet out our obligations in relation to any agreement you have with us, to resolve problems in relation to any services supplied to you, to create products or services that may compliment your needs.</p>\r\n\r\n<p>By using this Website for the purpose, you are voluntarily releasing information to us. Your e-mail address will be used by the Company to respond to you.</p>\r\n\r\n<p>In addition, we may have collected similar information from you in the past. By entering this Website you are consenting to the terms of our information Privacy Policy and to our continued use of previously collected information. By submitting your personal information to us, you will be treated as having given your permission for the processing and using of your personal data as set out in this policy.</p>\r\n\r\n<p>We may also send you other information about us, our Website, our newsletters, our products, sales promotions, our other Website and applications, SMS and e-mail alerts, anything relating to other companies in our group or our business partners. If you would prefer not to receive any of this additional information you may click the &quot;unsubscribe&quot; link in any email that we send to you or by sending an email at support@anydaymoney.com. Kindly note that unsubscribing from one medium does not automatically lead to end in subscription from the other. We endeavour that within 15 working days of receipt of your instruction, to cease to send you information as requested. If your instruction is unclear we may contact you for further information</p>\r\n\r\n<p>All the information provided to AFPL by you, including sensitive personal information, is voluntary. You understand that we may use certain information of yours, which has been designated as &#39;sensitive personal data or information&#39;, (i) for the purpose of providing you the Services; (ii) for commercial purposes and in an aggregated or non- personally identifiable form for research, statistical analysis and business intelligence purposes; and (iii) for sale or transfer such research, statistical or intelligence data in an aggregated or non-personally identifiable form to third parties and affiliates. AFPL also reserves the right to use information provided by or about the end-user for the following purposes:</p>\r\n\r\n<p>Contacting the users for offering new products or services;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Contacting the users for taking product and service feedback;</p>\r\n\r\n<p>Analysing software usage patterns for improving product design and utility;</p>\r\n\r\n<p>Publishing such information on the Website, including but not limited to, by way of testimonials, etc.; and Analysing anonymized practice information for commercial use.</p>\r\n\r\n<p>In addition to the terms of this Privacy Policy, this section applies to all users registered with AFPL: As part of the registration as well as the loan application creation and submission process that is available to the users on the Website, certain information, including sensitive personal data or information is collected from the users with their consent and may be shared with our partner banks &amp; NBFCs and other financial institutions;</p>\r\n\r\n<p>All the statements in this Privacy Policy apply to all users, and all users are therefore required to read and understand this policy set out herein prior to submitting any sensitive personal data or information to AFPL, failing which they are required to leave our Website immediately;</p>\r\n\r\n<p>Users&#39; personally identifiable information, which they choose to provide to AFPL, is used to help the users describe and identify themselves. This information is exclusively owned by AFPL. AFPL may use such information for commercial purposes and in an aggregated or non- personally identifiable form for research, statistical analysis and business intelligence purposes, and may sell or otherwise transfer such research, statistical or intelligence data in an aggregated or non-personally identifiable form to third parties and affiliates; Upon consent of the users, their information may be shared with our partners, NBFCs, and other financial institutions, when users register on our Website. Our partners, NBFCs and other financial institutions may use this information to offer the users their products and services;</p>\r\n\r\n<p>Any personally identifiable information of the users collected through the Website is not generated by AFPL and is provided to AFPL by the users who wish to raise loans using the services available on our Website. AFPL shares this information with its partners &amp; NBFCs and other financial institutions on an AS-IS basis making no representation or warranty on the accuracy or completeness of the information. AFPL will, however, take reasonable steps to ensure the accuracy of the identity of the users.</p>\r\n\r\n<p>AFPL makes every effort to capture accurate information from the users. However, AFPL does not undertake any liability for any incorrect or incomplete information provided to its partners &amp; NBFCs and other financial institutions;</p>\r\n\r\n<p>AFPL will communicate with the users through email, phone and notices posted on the Website or through other means available through the service, including text and other forms of messaging. The users can change their e-mail and contact preferences by logging into their &quot;Account&quot; on the Website and changing the account settings; AFPL may keep records of electronic communications and telephone calls received and made in relation to the services or other purposes for the purpose of administration of our services, customer support, research and development and for better listing of users;</p>\r\n\r\n<p>All our employees and data processors, who have access to, and are associated with the processing of sensitive personal data or information, are obliged to respect the confidentiality of every users&#39; sensitive personal data and information;</p>\r\n\r\n<p>AFPL may also disclose or transfer users&#39; personal and other information a user provides, to a third party as part of reorganization or a sale of the assets of AFPL. Any third party to which AFPL transfers or sells its assets to, will have the right to continue to use the personal and other information that users provide to us, in accordance with the Terms of Use.</p>\r\n\r\n<p>To the extent necessary to provide users with the services, AFPL may provide their personal information to third party contractors who work on behalf of or with AFPL to provide users with such services, to help AFPL communicate with users or to maintain the Website. Generally, these contractors do not have any independent right to share this information, however certain contractors who provide services on the Website, including the providers of online communications services, will have rights to use and disclose the personal information collected in connection with the provision of these Services in accordance with their own privacy policies; and AFPL will not sell/share your personally identifiable information with any third party save and except in accordance with the terms of contained herein.</p>\r\n\r\n<p>When you submit such personal information to us, you represent that you have the lawful right to submit the personal information and agree that you will not submit any information unless you are legally entitled to do so and that such information is true, complete and accurate. You may not use a false email address or other identifying information, to impersonate any person or entity, or otherwise mislead as to the origin of any content.</p>\r\n\r\n<h3>COMMITMENT TO INFORMATION SECURITY</h3>\r\n\r\n<p>We take appropriate measures to ensure that your information disclosed to us is kept secure, accurate and up to date. This site has reasonable security measures in place to protect the loss, misuse, and alteration of the information under our control. We utilize firewalls, SSL encryption technologies, and secured server and authentication procedures for security purposes for our website.</p>\r\n\r\n<p>Unauthorised attempts to upload or change information (or otherwise cause damage to this Website) are strictly prohibited. However, we assume no liability for any disclosure of information due to any errors in transmission, unauthorised third-party access to our website and data bases or other acts of third parties or acts or omissions beyond our reasonable control. In the event AFPL becomes aware of any security breach, we will notify you as soon as possible and take appropriate action to the best of our ability to remedy such a breach.</p>\r\n\r\n<h3>LINKS TO THIRD PARTY WEBSITES</h3>\r\n\r\n<p>This Website contains links to sites outside www.anydaymoney.com. The Company is not responsible for the privacy practices, the content, the authentic nature, or safety of such other websites; and Our Website links to third party sites which we do not operate or endorse. These websites may use cookies and collect your personal or non-personal information in accordance with their own privacy policies. This Privacy Policy does not apply to third party websites and we are not responsible in any manner for third party websites. SHARING YOUR INFORMATION WITH THIRD PARTIES</p>\r\n\r\n<p>We may pass your Personal Information including your name and address on to a third party to deliver the services you have requested for.</p>\r\n\r\n<p>We may also share your data with our affiliates or agents or vendors or partner banks, NBFCs and other financial institutions, providing services through the Website. You further authorise the affiliates or agents or vendors to use this information to provide services to you, directly or indirectly.</p>\r\n\r\n<p>We may also use your data in order to manage this Website, enable you to subsequently access parts of this Website, detect any fraud or abuses, send you information relevant to the Website or our services, and in case we have any queries;</p>\r\n\r\n<p>We may disclose your information to service providers under contract who help with our business operations and services offered on the Website (such as, but not limited to, document collection services, user verification service providers, user credit rating agencies, etc.);</p>\r\n\r\n<p>We may also disclose your information to respond to legal requirements, enforce our policies, respond to claims that a listing or other content violates the rights of others, or protect anyone&#39;s rights, property, or safety. Such information will be disclosed in accordance with the applicable laws and regulations.</p>\r\n\r\n<p>We may also share your information with law enforcement, governmental agencies, or authorized third-parties, in response to a verified request relating to a criminal investigation or alleged illegal activity or any other activity that may expose us, you, or any other stakeholder of the company to legal liability. We may also disclose your information if: (i) required to do so under any law for time being in force, or required to do so under any order, decree or award passed by any Court, Tribunal or any statutory authority; (ii) trying to protect against the occurrence of, or prevent actual or potential, any fraud, hacking, malware attack or unauthorized transactions or for investigating any of the aforesaid activity which has already taken place; We may also share your information with other business entities, should we undergo any corporate restructuring including any plan to merge with or be acquired by that business entity or start a joint venture. (Should such a combination occur, we will require that the new combined entity follow this Privacy Policy with respect to your information);</p>\r\n\r\n<p>You must only submit to us or our agent or the Website information which is accurate and not misleading, and you must inform us of any changes; and</p>\r\n\r\n<p>Under no circumstances do we rent, trade, or share your personal information that we have collected with any other company for their marketing purposes without your consent. We reserve the right to communicate your personal information to any third party that makes a legally compliant request for its disclosure.</p>\r\n\r\n<h3>HOW LONG DO WE KEEP YOUR INFORMATION?</h3>\r\n\r\n<p>We will only keep your information for as long as (a) we are either required to by law, (b) as is relevant for the purposes for which it was collected, or (c) in the good-faith belief that such action is necessary to protect and defend the rights, property, or safety of PCPL, its users, or the public.</p>\r\n\r\n<h3>INFORMATION PLACED ON YOUR COMPUTER - COOKIES</h3>\r\n\r\n<p>We may store some information such as cookies on your Device when you access our Website. Cookies are text files containing small amounts of information which we download onto your Device when you visit our Website and App for record-keeping purposes. We can recognise these cookies on subsequent visits, and they allow us to remember you.</p>\r\n\r\n<p>A few important things you should know about our use of Cookies:</p>\r\n\r\n<p>We use both session and persistent Cookies. Session Cookies expire and no longer have any effect when you close your browser. Persistent Cookies remain on your device until you erase them, or they expire.</p>\r\n\r\n<p>You are always free to decline Cookies if your web browser permits, although doing so may interfere with your use of our Website. Refer to the help section of your browser, browser extensions, or installed applications for instructions on blocking, deleting, or disabling Cookies.</p>\r\n\r\n<p>We encode and protect our Cookies so that only we can interpret the information stored in them.</p>\r\n\r\n<p>You may encounter Cookies from third parties, known as service providers, that we have allowed on our site that assist us with various aspects of our web site operations and services; and</p>\r\n\r\n<p>If you want to find out more information about cookies, go to http://www.allaboutcookies.org or to find out about removing them from your browser, go to http://www.allaboutcookies.org/manage-cookies/index.html.</p>\r\n\r\n<h3>CHILDREN&#39;S AND MINOR&#39;S PRIVACY</h3>\r\n\r\n<p>AFPL strongly encourages parents and guardians to supervise the online activities of their minor children and consider using parental control tools available from online services and software manufacturers to help provide a child-friendly online environment. These tools also can prevent minors from disclosing their name, address, and other personally identifiable information online without parental permission.</p>\r\n\r\n<h3>CHANGES TO THIS PRIVACY POLICY</h3>\r\n\r\n<p>We reserve the right, at our discretion, to change, alter, modify, add, or remove portions from this Privacy Policy at any time so you are encouraged to review this Privacy Policy from time to time.</p>\r\n\r\n<h3>MISCELLANEOUS</h3>\r\n\r\n<p>All users must always provide accurate and updated information to the website enables you to change or amend your provided information, through your registered account on our system.</p>\r\n\r\n<p>Users can request to ask if we are holding and piece of their personal data or receive a copy of that information, if you have given us a viable proof of your identity. In case you are not able to prove your identity, the company reserves the right of refusal to send forward any personal details of our registered users. We will also make sure to respond promptly to all user requests for any personal details that the company holds about the user.</p>\r\n\r\n<p>In case a customer does not wish to receive updates or notices regarding our business in the future, they are entitled to opting out by altering their preferences from their accounts, or by getting in contact with our customer care representatives through the address mentioned at the end of our Privacy Policy. Your request will always be completed as quick and fluently as possible. You can opt out of receiving emails from us by unsubscribing through an email that you will be sent after contacting us as outlined below. Any changes that you make will only affect how your information will be used in the future.</p>\r\n\r\n<h3>CONTACTING US</h3>\r\n\r\n<p>Questions, comments, and requests regarding this Privacy Policy should be addressed to support@anydaymoney.com. You may also contact us on +91-9700-55-66-77 (Monday-Saturday, 10am to 6pm).</p>', 'privacy-policy', '2020-10-03 06:23:53', '2020-10-03 06:23:53'),
(14, 'title', 'Contact', 'contact-us', '2020-10-03 06:38:27', '2020-10-03 06:38:27'),
(15, 'title_second', 'Us', 'contact-us', '2020-10-03 06:38:27', '2020-10-03 06:38:27'),
(16, 'sub_title', 'Please call or email contact form and we will be happy to assist you.', 'contact-us', '2020-10-03 06:38:27', '2020-10-03 06:38:27'),
(17, 'email_title', 'EMAIL', 'theme-settings', '2020-10-03 07:07:57', '2020-10-03 07:07:57'),
(18, 'email_sub_title', 'Please call or email contact form and we will be happy to assist you.', 'theme-settings', '2020-10-03 07:07:57', '2020-10-03 07:07:57'),
(19, 'email_address', 'support@anydaymoney.com', 'theme-settings', '2020-10-03 07:07:57', '2020-10-03 07:07:57'),
(20, 'contact_title', 'CONTACT DETAILS', 'theme-settings', '2020-10-03 07:07:57', '2020-10-03 07:07:57'),
(21, 'contact_sub_title', 'Please call or email contact form and we will be happy to assist you.', 'theme-settings', '2020-10-03 07:07:57', '2020-10-03 07:07:57'),
(22, 'phone_number', '+91 9540394440', 'theme-settings', '2020-10-03 07:07:57', '2020-10-03 07:07:57'),
(23, 'address_title', 'ADDRESS', 'theme-settings', '2020-10-03 07:07:57', '2020-10-03 07:07:57'),
(24, 'address_sub_title', 'Please call or email contact form and we will be happy to assist you.', 'theme-settings', '2020-10-03 07:07:57', '2020-10-03 07:07:57'),
(25, 'address', 'AnyDay Fintech Private Ltd., 101-104, Metro House, Mangaldas Road, Pune -411001', 'theme-settings', '2020-10-03 07:07:57', '2020-10-03 12:45:27'),
(26, 'copyright_text', 'Anyday Money Pvt. Ltd.', 'theme-settings', '2020-10-03 07:17:31', '2020-10-03 07:17:31'),
(27, 'banner_image', '1602952898.png', 'partner-with-us', '2020-10-03 07:28:11', '2020-10-17 11:11:38'),
(28, 'content_tile_1', 'Easy Digital Loan Application', 'about-us', '2020-10-03 08:41:20', '2020-10-03 08:56:03'),
(29, 'content_sub_title_1', 'Apply online through either Mobile Application or our Website within minutes', 'about-us', '2020-10-03 08:41:20', '2020-10-03 08:56:03'),
(30, 'content_tile_2', 'Instant Disbursal', 'about-us', '2020-10-03 08:41:20', '2020-10-03 08:56:03'),
(31, 'content_sub_title_2', 'Instant Disbursal to your bank account post approval', 'about-us', '2020-10-03 08:41:20', '2020-10-03 08:56:03'),
(32, 'content_tile_3', 'Flexible Tenure', 'about-us', '2020-10-03 08:41:20', '2020-10-03 08:56:03'),
(33, 'content_sub_title_3', 'Choose your loan tenure as per your convenience', 'about-us', '2020-10-03 08:41:20', '2020-10-03 08:56:03'),
(34, 'content_tile_4', 'No Pre-payment Charges', 'about-us', '2020-10-03 08:41:21', '2020-10-03 08:56:03'),
(35, 'content_sub_title_4', 'Pay in parts as per your convenience', 'about-us', '2020-10-03 08:41:21', '2020-10-03 08:56:03'),
(36, 'content_tile_5', 'Quick Approvals', 'about-us', '2020-10-03 08:41:21', '2020-10-03 08:41:21'),
(37, 'content_sub_title_5', 'Digital verification process for faster loan approval', 'about-us', '2020-10-03 08:41:21', '2020-10-03 08:41:21'),
(38, 'content_tile_6', 'No Fore-closure Charges', 'about-us', '2020-10-03 08:41:21', '2020-10-03 08:41:21'),
(39, 'content_sub_title_6', 'Now save money by prepaying at your convenience with no extra charge, unlike traditional banks/NBFC', 'about-us', '2020-10-03 08:41:21', '2020-10-03 08:41:21'),
(40, 'title', 'How to Apply?', 'how-to-apply', '2020-10-03 08:57:20', '2020-10-03 08:57:20'),
(41, 'sub_title', '<p>4 easy and quick steps to apply for<br />\r\nAnyday Money Loan</p>', 'how-to-apply', '2020-10-03 08:57:20', '2020-10-03 08:59:40'),
(42, 'content_tile_1', 'Quick Application', 'how-to-apply', '2020-10-03 08:57:20', '2020-10-15 10:42:30'),
(43, 'content_sub_title_1', 'Enter basic details to build your profile', 'how-to-apply', '2020-10-03 08:57:20', '2020-10-03 08:57:20'),
(44, 'content_tile_2', 'Pre-approved eligibility', 'how-to-apply', '2020-10-03 08:57:20', '2020-10-03 08:57:20'),
(45, 'content_sub_title_2', 'Your eligibility will be calculated on the basis of your profile details', 'how-to-apply', '2020-10-03 08:57:20', '2020-10-03 08:57:20'),
(46, 'content_tile_3', 'Submit documents', 'how-to-apply', '2020-10-03 08:57:20', '2020-10-03 08:57:20'),
(47, 'content_sub_title_3', 'Upload necessary documents digitally for quick credit approval', 'how-to-apply', '2020-10-03 08:57:20', '2020-10-03 08:57:20'),
(48, 'content_tile_4', 'Disbursement', 'how-to-apply', '2020-10-03 08:57:20', '2020-10-03 08:57:20'),
(49, 'content_sub_title_4', 'Approved loan amount credited to your bank account', 'how-to-apply', '2020-10-03 08:57:20', '2020-10-03 08:57:20'),
(50, 'twitter_link', 'https://twitter.com/', 'theme-settings', '2020-10-03 09:14:28', '2020-10-03 09:14:28'),
(51, 'facebook_link', 'https://www.facebook.com/', 'theme-settings', '2020-10-03 09:14:28', '2020-10-03 09:14:28'),
(52, 'pinterest_link', 'https://in.pinterest.com/', 'theme-settings', '2020-10-03 09:14:28', '2020-10-03 09:14:28'),
(53, 'linkdin_link', 'https://in.linkedin.com/', 'theme-settings', '2020-10-03 09:14:28', '2020-10-03 09:14:28'),
(54, 'main_title', 'Personal Loans', 'product-1', '2020-10-04 06:54:13', '2020-10-04 06:54:13'),
(55, 'title', '<p>Stressed over high interest<br />\r\non Credit Card dues?</p>', 'product-1', '2020-10-04 06:54:13', '2020-10-04 07:01:52'),
(56, 'sub_title', 'Avail quick and affordable loans from AnyDay Money', 'product-1', '2020-10-04 06:54:13', '2020-10-04 06:54:13'),
(57, 'main_content_title', 'Personal Loan', 'product-1', '2020-10-04 06:54:13', '2020-10-04 06:54:13'),
(58, 'main_content', '<p>Mid-month financial crisis can become a problem in situations where you need to pay school fees, medical emergencies, family functions, unplanned holiday trips or even that luxury item that you wanted to have in your home.</p>\r\n\r\n<p>AnyDay Money loans are specially tailored to meet the needs of salaried individuals and helps you tide over your mid-month planned or unplanned short-term financial needs.</p>', 'product-1', '2020-10-04 06:54:13', '2020-10-04 06:54:13'),
(59, 'main_title', 'Business Loans', 'product-2', '2020-10-04 07:12:30', '2020-10-04 07:12:30'),
(60, 'title', '<p>Need funds to manage<br />\r\nand grow your business?</p>', 'product-2', '2020-10-04 07:12:30', '2020-10-04 07:12:30'),
(61, 'sub_title', 'Apply for quick business loans', 'product-2', '2020-10-04 07:12:30', '2020-10-04 07:12:30'),
(62, 'main_content_title', 'Business Loan', 'product-2', '2020-10-04 07:12:30', '2020-10-04 07:12:30'),
(63, 'main_content', '<p>Most small and medium business often need short-term loans to meet their working capital requirements or for business expansion.</p>\r\n\r\n<p>Now getting that much needed business loan is just a click away! Our specially crafted business loans will give your business the boost that is required.</p>\r\n\r\n<p>AnyDay Business Loans removes the hassles involved in traditional loans through a completely digital lending process from application to disbursement thereby helping you grow your business faster.</p>', 'product-2', '2020-10-04 07:12:30', '2020-10-04 07:12:30'),
(64, 'main_title', 'Medical Loans', 'product-3', '2020-10-04 07:14:10', '2020-10-04 07:14:10'),
(65, 'title', '<p>Sudden medical emergencies?</p>', 'product-3', '2020-10-04 07:14:10', '2020-10-04 07:14:10'),
(66, 'sub_title', 'Take care of your loved ones while we take care of your financial worries', 'product-3', '2020-10-04 07:14:10', '2020-10-04 07:14:10'),
(67, 'main_content_title', 'Medical Loan', 'product-3', '2020-10-04 07:14:10', '2020-10-04 07:14:10'),
(68, 'main_content', '<p>Emergency situations can be unpredictable and in times of unforeseen medical emergencies, money should never come in way of treatments.<br />\r\nGetting hassle free funds should be the priority.</p>\r\n\r\n<p>AnyDay Money Loans for medical emergencies ensures that the financial worries at such difficult times are lifted off your shoulders so that you<br />\r\nget all the time in the world to focus on the health and care of your loved ones.</p>\r\n\r\n<p>Click the link below to apply and let money be the least of your worries.</p>', 'product-3', '2020-10-04 07:14:10', '2020-10-04 07:14:10'),
(69, 'main_title', 'Education Loans', 'product-4', '2020-10-04 07:16:57', '2020-10-04 07:16:57'),
(70, 'title', '<p>Enabling higher education<br />\r\nto meet your life goals</p>', 'product-4', '2020-10-04 07:16:57', '2020-10-04 07:16:57'),
(71, 'main_content_title', 'Education Loan', 'product-4', '2020-10-04 07:16:57', '2020-10-04 07:16:57'),
(72, 'main_content', '<p>We all have dreams of higher education for ourselves or our family members which often face hurdles because of financial constraints.</p>\r\n\r\n<p>Now let that dream grow wings to fly towards a better future. Do not let these financial constraints become a barrier to meeting your or your child&acirc;&euro;&trade;s career aspirations.</p>\r\n\r\n<p>Be it tuition fees or the living cost outside home, AnyDay Money Loans for Education helps you meet your short-term education related financial needs, thereby paying the way towards a better and confident future.</p>', 'product-4', '2020-10-04 07:16:57', '2020-10-04 07:16:57'),
(73, 'title', 'Calculate your EMI', 'emi-calculation', '2020-10-05 05:41:28', '2020-10-05 10:44:08'),
(74, 'title_second', 'Eligibility Criteria', 'emi-calculation', '2020-10-05 05:41:28', '2020-10-05 05:41:28'),
(75, 'sub_title', '<p>Check Your Loan EMI With The Calculator Given As Per Your Convenience. You Can Check<br />\r\nYour Repayment Amount By Choosing Loan Amount, Tenure And Interest</p>', 'emi-calculation', '2020-10-05 05:41:28', '2020-10-05 05:43:36'),
(76, 'content_tile_1', 'Eligible', 'product-1', '2020-10-05 06:27:23', '2020-10-05 06:27:23'),
(77, 'content_sub_title_1', 'Salaried Individuals', 'product-1', '2020-10-05 06:27:24', '2020-10-05 06:27:24'),
(78, 'content_tile_2', 'Minimum Age', 'product-1', '2020-10-05 06:27:24', '2020-10-05 06:27:24'),
(79, 'content_sub_title_2', '21 years and above', 'product-1', '2020-10-05 06:27:24', '2020-10-05 06:27:24'),
(80, 'content_tile_3', 'Minimum Salary Required', 'product-1', '2020-10-05 06:27:24', '2020-10-05 06:27:24'),
(81, 'content_sub_title_3', 'Rs. 15,000 per month', 'product-1', '2020-10-05 06:27:24', '2020-10-05 06:27:24'),
(82, 'content_tile_4', 'Loan Amount', 'product-1', '2020-10-05 06:27:24', '2020-10-05 06:27:24'),
(83, 'content_sub_title_4', 'Rs. 5,000 onwards', 'product-1', '2020-10-05 06:27:24', '2020-10-05 06:27:24'),
(84, 'content_tile_1', 'Loan Purpose', 'product-2', '2020-10-05 06:33:31', '2020-10-05 06:41:19'),
(85, 'content_sub_title_1', '<p>Working Capital<br />\r\nBusiness Expansion&nbsp;<br />\r\nTakeover of Existing<br />\r\nhigh cost Loans</p>', 'product-2', '2020-10-05 06:33:31', '2020-10-05 06:39:36'),
(86, 'content_tile_2', 'Minimum Age', 'product-2', '2020-10-05 06:33:31', '2020-10-05 06:33:31'),
(87, 'content_sub_title_2', '21 to 65', 'product-2', '2020-10-05 06:33:32', '2020-10-05 06:41:45'),
(88, 'content_tile_3', 'Loan Amount', 'product-2', '2020-10-05 06:33:32', '2020-10-05 06:41:19'),
(89, 'content_sub_title_3', 'Rs. 50,000 onwards', 'product-2', '2020-10-05 06:33:32', '2020-10-05 06:41:45'),
(90, 'content_tile_4', 'Loan Amount', 'product-2', '2020-10-05 06:33:32', '2020-10-05 06:33:32'),
(91, 'content_sub_title_4', 'Rs. 5,000 onwards', 'product-2', '2020-10-05 06:33:32', '2020-10-05 06:33:32'),
(92, 'content_tile_1', 'Eligible', 'product-3', '2020-10-05 06:34:23', '2020-10-05 06:34:23'),
(93, 'content_sub_title_1', 'Salaried / Non salaried Individuals', 'product-3', '2020-10-05 06:34:23', '2020-10-05 06:43:35'),
(94, 'content_tile_2', 'Minimum Age', 'product-3', '2020-10-05 06:34:23', '2020-10-05 06:34:23'),
(95, 'content_sub_title_2', '21 or above', 'product-3', '2020-10-05 06:34:23', '2020-10-05 06:43:35'),
(96, 'content_tile_3', 'Minimum Salary Required', 'product-3', '2020-10-05 06:34:23', '2020-10-05 06:34:23'),
(97, 'content_sub_title_3', 'Rs. 15,000 per month', 'product-3', '2020-10-05 06:34:23', '2020-10-05 06:34:23'),
(98, 'content_tile_4', 'Loan Amount', 'product-3', '2020-10-05 06:34:23', '2020-10-05 06:34:23'),
(99, 'content_sub_title_4', 'Rs. 10,000 onwards', 'product-3', '2020-10-05 06:34:23', '2020-10-05 06:43:35'),
(100, 'content_tile_1', 'Eligible', 'product-4', '2020-10-05 06:46:08', '2020-10-05 06:46:08'),
(101, 'content_sub_title_1', 'Salaried Individuals', 'product-4', '2020-10-05 06:46:08', '2020-10-05 06:46:08'),
(102, 'content_tile_2', 'Minimum Age', 'product-4', '2020-10-05 06:46:08', '2020-10-05 06:46:08'),
(103, 'content_sub_title_2', '21 or above', 'product-4', '2020-10-05 06:46:09', '2020-10-05 06:46:09'),
(104, 'content_tile_3', 'Minimum Salary Required', 'product-4', '2020-10-05 06:46:09', '2020-10-05 06:46:09'),
(105, 'content_sub_title_3', 'Rs. 15,000', 'product-4', '2020-10-05 06:46:09', '2020-10-05 06:46:09'),
(106, 'content_tile_4', 'Loan Amount', 'product-4', '2020-10-05 06:46:09', '2020-10-05 06:46:09'),
(107, 'content_sub_title_4', 'Rs. 10,000 onwards', 'product-4', '2020-10-05 06:46:09', '2020-10-05 06:46:09'),
(108, 'feature_tile_1', 'Easy Digital Loan Application', 'product-1', '2020-10-05 08:49:38', '2020-10-05 08:49:38'),
(109, 'feature_sub_title_1', 'Apply online through either Mobile Application or our Website within minutes', 'product-1', '2020-10-05 08:49:38', '2020-10-05 08:49:38'),
(110, 'feature_tile_2', 'Instant Disbursal', 'product-1', '2020-10-05 08:49:38', '2020-10-05 08:49:38'),
(111, 'feature_sub_title_2', 'Instant Disbursal to your bank account post approval', 'product-1', '2020-10-05 08:49:38', '2020-10-05 08:49:38'),
(112, 'feature_tile_3', 'Flexible Tenure', 'product-1', '2020-10-05 08:49:38', '2020-10-05 08:49:38'),
(113, 'feature_sub_title_3', 'Choose your loan tenure as per your convenience', 'product-1', '2020-10-05 08:49:38', '2020-10-05 08:49:38'),
(114, 'feature_tile_4', 'No Pre-payment Charges', 'product-1', '2020-10-05 08:49:38', '2020-10-05 08:49:38'),
(115, 'feature_sub_title_4', 'Pay in parts as per your convenience', 'product-1', '2020-10-05 08:49:39', '2020-10-05 08:49:39'),
(116, 'feature_tile_5', 'Quick Approvals', 'product-1', '2020-10-05 08:49:39', '2020-10-05 08:49:39'),
(117, 'feature_sub_title_5', 'Digital verification process for faster loan approval', 'product-1', '2020-10-05 08:49:39', '2020-10-05 08:49:39'),
(118, 'feature_tile_6', 'No Fore-closure Charges', 'product-1', '2020-10-05 08:49:39', '2020-10-05 08:49:39'),
(119, 'feature_sub_title_6', 'Now save money by prepaying at your convenience with no extra charge, unlike traditional banks/NBFC', 'product-1', '2020-10-05 08:49:39', '2020-10-05 08:49:39'),
(120, 'feature_tile_1', 'Easy Digital Loan Application', 'product-2', '2020-10-05 08:50:14', '2020-10-05 08:50:14'),
(121, 'feature_sub_title_1', 'Apply online through either Mobile Application or our Website within minutes', 'product-2', '2020-10-05 08:50:14', '2020-10-05 08:50:14'),
(122, 'feature_tile_2', 'Instant Disbursal', 'product-2', '2020-10-05 08:50:14', '2020-10-05 08:50:14'),
(123, 'feature_sub_title_2', 'Instant Disbursal to your bank account post approval', 'product-2', '2020-10-05 08:50:14', '2020-10-05 08:50:14'),
(124, 'feature_tile_3', 'Flexible Tenure', 'product-2', '2020-10-05 08:50:14', '2020-10-05 08:50:14'),
(125, 'feature_sub_title_3', 'Choose your loan tenure as per your convenience', 'product-2', '2020-10-05 08:50:14', '2020-10-05 08:50:14'),
(126, 'feature_tile_4', 'No Pre-payment Charges', 'product-2', '2020-10-05 08:50:14', '2020-10-05 08:50:14'),
(127, 'feature_sub_title_4', 'Pay in parts as per your convenience', 'product-2', '2020-10-05 08:50:15', '2020-10-05 08:50:15'),
(128, 'feature_tile_5', 'Quick Approvals', 'product-2', '2020-10-05 08:50:15', '2020-10-05 08:50:15'),
(129, 'feature_sub_title_5', 'Digital verification process for faster loan approval', 'product-2', '2020-10-05 08:50:15', '2020-10-05 08:50:15'),
(130, 'feature_tile_6', 'No Fore-closure Charges', 'product-2', '2020-10-05 08:50:15', '2020-10-05 08:50:15'),
(131, 'feature_sub_title_6', 'Now save money by prepaying at your convenience with no extra charge, unlike traditional banks/NBFC', 'product-2', '2020-10-05 08:50:15', '2020-10-05 08:50:15'),
(132, 'feature_tile_1', 'Easy Digital Loan Application', 'product-3', '2020-10-05 08:52:05', '2020-10-05 08:52:05'),
(133, 'feature_sub_title_1', 'Apply online through either Mobile Application or our Website within minutes', 'product-3', '2020-10-05 08:52:05', '2020-10-05 08:52:05'),
(134, 'feature_tile_2', 'Instant Disbursal', 'product-3', '2020-10-05 08:52:05', '2020-10-05 08:52:05'),
(135, 'feature_sub_title_2', 'Instant Disbursal to your bank account post approval', 'product-3', '2020-10-05 08:52:05', '2020-10-05 08:52:05'),
(136, 'feature_tile_3', 'Flexible Tenure', 'product-3', '2020-10-05 08:52:05', '2020-10-05 08:52:05'),
(137, 'feature_sub_title_3', 'Choose your loan tenure as per your convenience', 'product-3', '2020-10-05 08:52:05', '2020-10-05 08:52:05'),
(138, 'feature_tile_4', 'No Pre-payment Charges', 'product-3', '2020-10-05 08:52:05', '2020-10-05 08:52:05'),
(139, 'feature_sub_title_4', 'Pay in parts as per your convenience', 'product-3', '2020-10-05 08:52:05', '2020-10-05 08:52:05'),
(140, 'feature_tile_5', 'Quick Approvals', 'product-3', '2020-10-05 08:52:05', '2020-10-05 08:52:05'),
(141, 'feature_sub_title_5', 'Digital verification process for faster loan approval', 'product-3', '2020-10-05 08:52:05', '2020-10-05 08:52:05'),
(142, 'feature_tile_6', 'No Fore-closure Charges', 'product-3', '2020-10-05 08:52:05', '2020-10-05 08:52:05'),
(143, 'feature_sub_title_6', 'Now save money by prepaying at your convenience with no extra charge, unlike traditional banks/NBFC', 'product-3', '2020-10-05 08:52:06', '2020-10-05 08:52:06'),
(144, 'feature_tile_1', 'Easy Digital Loan Application', 'product-4', '2020-10-05 08:52:23', '2020-10-05 08:52:23'),
(145, 'feature_sub_title_1', 'Apply online through either Mobile Application or our Website within minutes', 'product-4', '2020-10-05 08:52:23', '2020-10-05 08:52:23'),
(146, 'feature_tile_2', 'Instant Disbursal', 'product-4', '2020-10-05 08:52:23', '2020-10-05 08:52:23'),
(147, 'feature_sub_title_2', 'Instant Disbursal to your bank account post approval', 'product-4', '2020-10-05 08:52:23', '2020-10-05 08:52:23'),
(148, 'feature_tile_3', 'Flexible Tenure', 'product-4', '2020-10-05 08:52:23', '2020-10-05 08:52:23'),
(149, 'feature_sub_title_3', 'Choose your loan tenure as per your convenience', 'product-4', '2020-10-05 08:52:23', '2020-10-05 08:52:23'),
(150, 'feature_tile_4', 'No Pre-payment Charges', 'product-4', '2020-10-05 08:52:23', '2020-10-05 08:52:23'),
(151, 'feature_sub_title_4', 'Pay in parts as per your convenience', 'product-4', '2020-10-05 08:52:23', '2020-10-05 08:52:23'),
(152, 'feature_tile_5', 'Quick Approvals', 'product-4', '2020-10-05 08:52:23', '2020-10-05 08:52:23'),
(153, 'feature_sub_title_5', 'Digital verification process for faster loan approval', 'product-4', '2020-10-05 08:52:23', '2020-10-05 08:52:23'),
(154, 'feature_tile_6', 'No Fore-closure Charges', 'product-4', '2020-10-05 08:52:23', '2020-10-05 08:52:23'),
(155, 'feature_sub_title_6', 'Now save money by prepaying at your convenience with no extra charge, unlike traditional banks/NBFC', 'product-4', '2020-10-05 08:52:23', '2020-10-05 08:52:23'),
(156, 'title', 'Why Anyday Money', 'why-anyday-money', '2020-10-05 09:14:51', '2020-10-05 09:14:51'),
(157, 'sub_title', 'A wide range of features and benefits', 'why-anyday-money', '2020-10-05 09:14:51', '2020-10-05 09:14:51'),
(158, 'content_tile_1', 'Easy, paperless application process', 'why-anyday-money', '2020-10-05 09:14:51', '2020-10-05 09:14:51'),
(159, 'content_tile_2', 'Quick Approval', 'why-anyday-money', '2020-10-05 09:14:51', '2020-10-05 09:14:51'),
(160, 'content_tile_3', 'Flexible tenures', 'why-anyday-money', '2020-10-05 09:14:51', '2020-10-05 09:14:51'),
(161, 'content_tile_4', 'No collaterals', 'why-anyday-money', '2020-10-05 09:14:51', '2020-10-05 09:14:51'),
(162, 'content_tile_5', 'Minimum Documentation', 'why-anyday-money', '2020-10-05 09:14:51', '2020-10-05 09:14:51'),
(163, 'content_tile_6', 'No hidden charges', 'why-anyday-money', '2020-10-05 09:14:51', '2020-10-05 09:14:51'),
(164, 'title', 'Why Anyday Money', 'why-any-day-money', '2020-10-05 09:17:12', '2020-10-05 09:17:12'),
(165, 'sub_title', 'A wide range of features and benefits', 'why-any-day-money', '2020-10-05 09:17:12', '2020-10-05 09:17:12'),
(166, 'content_tile_1', 'Easy, paperless application process', 'why-any-day-money', '2020-10-05 09:17:12', '2020-10-05 09:17:12'),
(167, 'content_tile_2', 'Quick Approval', 'why-any-day-money', '2020-10-05 09:17:12', '2020-10-05 09:17:12'),
(168, 'content_tile_3', 'Flexible tenures', 'why-any-day-money', '2020-10-05 09:17:12', '2020-10-05 09:17:12'),
(169, 'content_tile_4', 'No collaterals', 'why-any-day-money', '2020-10-05 09:17:12', '2020-10-05 09:17:12'),
(170, 'content_tile_5', 'Minimum Documentation', 'why-any-day-money', '2020-10-05 09:17:12', '2020-10-05 09:17:12'),
(171, 'content_tile_6', 'No Pre-payment charges', 'why-any-day-money', '2020-10-05 09:17:12', '2020-10-05 09:18:02'),
(172, 'content_tile_7', 'No foreclosure charges', 'why-any-day-money', '2020-10-05 09:18:03', '2020-10-05 09:18:03'),
(173, 'content_tile_8', 'Easy Application Process', 'why-any-day-money', '2020-10-05 09:18:03', '2020-10-05 09:18:03'),
(174, 'content_tile_9', 'No hidden charges', 'why-any-day-money', '2020-10-05 09:18:03', '2020-10-05 09:18:03'),
(175, 'title', 'Testimonials', 'testimonials', '2020-10-05 09:47:56', '2020-10-05 09:47:56'),
(176, 'content_tile_1', '<p>This app is genuine and people are really helpful. They would understand your need and go extra mile to assist you.Super Awesome! Keep up the good work!</p>', 'testimonials', '2020-10-05 09:47:56', '2020-10-05 09:47:56'),
(177, 'content_sub_title_1', 'Sourav Tiwari', 'testimonials', '2020-10-05 09:47:56', '2020-10-05 09:47:56'),
(178, 'content_tile_2', '<p>Great App to apply personal loans for salaried class. Simple user interface and great customer service. Credit staff user friendly.</p>', 'testimonials', '2020-10-05 09:47:56', '2020-10-05 09:51:53'),
(179, 'content_sub_title_2', 'Monika Shah', 'testimonials', '2020-10-05 09:47:56', '2020-10-05 09:47:56'),
(180, 'content_tile_3', '<p>Super awesome credit services or I would say one of the best services so far. Just one phone call and meet up with documents and all was done in just 24hrs and the amount was in my account .....a big thank you once again</p>', 'testimonials', '2020-10-05 09:47:56', '2020-10-05 09:51:53'),
(181, 'content_sub_title_3', 'Rahul Devan', 'testimonials', '2020-10-05 09:47:56', '2020-10-05 09:47:56'),
(182, 'content_tile_4', '<p>Very efficient and excellent service and really helpful application when you need money on urgent basis. Excellent app really helpful.</p>', 'testimonials', '2020-10-05 09:47:56', '2020-10-05 09:51:53'),
(183, 'content_sub_title_4', 'Mahesh Bhosale', 'testimonials', '2020-10-05 09:47:56', '2020-10-05 09:47:56'),
(184, 'slider_1_main_title', 'Personal Loans', 'home-slider', '2020-10-05 10:04:58', '2020-10-05 10:04:58'),
(185, 'slider_1_title', 'Mid-month cash crunch', 'home-slider', '2020-10-05 10:04:58', '2020-10-05 10:04:58'),
(186, 'slider_1_sub_title', 'No more problem  now with  AnyDay Money Loans', 'home-slider', '2020-10-05 10:04:58', '2020-10-05 10:04:58'),
(187, 'slider_1_content_tile_1', 'Quick & Easy Loan application process', 'home-slider', '2020-10-05 10:04:58', '2020-10-05 10:04:58'),
(188, 'slider_1_tile_2', 'No repayment or foreclosure charges', 'home-slider', '2020-10-05 10:04:58', '2020-10-05 10:04:58'),
(189, 'slider_1_tile_3', 'Direct disbursement to bank account', 'home-slider', '2020-10-05 10:04:58', '2020-10-05 10:04:58'),
(190, 'slider_2_main_title', 'Business Loans', 'home-slider', '2020-10-05 10:10:01', '2020-10-05 10:10:01'),
(191, 'slider_2_title', 'Need funds to manage', 'home-slider', '2020-10-05 10:10:02', '2020-10-05 10:52:43'),
(192, 'slider_2_sub_title', 'Apply for quick business loans', 'home-slider', '2020-10-05 10:10:02', '2020-10-05 10:10:02'),
(193, 'slider_2_content_tile_1', 'Quick & Easy Loan application process', 'home-slider', '2020-10-05 10:10:02', '2020-10-05 10:10:02'),
(194, 'slider_2_tile_2', 'No repayment or foreclosure charges', 'home-slider', '2020-10-05 10:10:02', '2020-10-05 10:10:02'),
(195, 'slider_2_tile_3', 'Direct disbursement to bank account', 'home-slider', '2020-10-05 10:10:02', '2020-10-05 10:10:02'),
(196, 'slider_3_main_title', 'Medical Loans', 'home-slider', '2020-10-05 10:13:47', '2020-10-05 10:13:47');
INSERT INTO `pages` (`id`, `meta_key`, `meta_value`, `type`, `created_at`, `updated_at`) VALUES
(197, 'slider_3_title', 'Sudden medical emergencies?', 'home-slider', '2020-10-05 10:13:47', '2020-10-05 10:13:47'),
(198, 'slider_3_sub_title', 'Take care of your loved ones while we', 'home-slider', '2020-10-05 10:13:47', '2020-10-05 10:13:47'),
(199, 'slider_3_sub_title_2', 'take care of your financial worries', 'home-slider', '2020-10-05 10:13:47', '2020-10-05 10:13:47'),
(200, 'slider_3_content_tile_1', 'Quick & Easy Loan application process', 'home-slider', '2020-10-05 10:13:47', '2020-10-05 10:13:47'),
(201, 'slider_3_tile_2', 'No repayment or foreclosure charges', 'home-slider', '2020-10-05 10:13:47', '2020-10-05 10:13:47'),
(202, 'slider_3_tile_3', 'Direct disbursement to bank account', 'home-slider', '2020-10-05 10:13:47', '2020-10-05 10:13:47'),
(203, 'slider_4_main_title', 'Education Loans', 'home-slider', '2020-10-05 10:18:31', '2020-10-05 10:21:07'),
(204, 'slider_4_main_title_2', 'easier and quicker with', 'home-slider', '2020-10-05 10:18:31', '2020-10-05 10:18:31'),
(205, 'slider_4_sub_title', 'Anyday Money', 'home-slider', '2020-10-05 10:18:31', '2020-10-05 10:18:31'),
(206, 'slider_4_content_tile_1', 'Quick & Easy Loan application process', 'home-slider', '2020-10-05 10:18:31', '2020-10-05 10:18:31'),
(207, 'slider_4_tile_2', 'No repayment or foreclosure charges', 'home-slider', '2020-10-05 10:18:31', '2020-10-05 10:18:31'),
(208, 'slider_4_tile_3', 'Direct disbursement to bank account', 'home-slider', '2020-10-05 10:18:31', '2020-10-05 10:18:31'),
(209, 'slider_4_title', 'Enabling higher education', 'home-slider', '2020-10-05 10:21:07', '2020-10-05 10:21:07'),
(210, 'slider_4_title_2', 'to meet your life goals', 'home-slider', '2020-10-05 10:21:07', '2020-10-05 10:21:07'),
(211, 'features_title', 'Personal Loan’s', 'product-1', '2020-10-05 10:28:55', '2020-10-05 10:28:55'),
(212, 'features_title_second', 'Features and benefits', 'product-1', '2020-10-05 10:28:55', '2020-10-05 10:28:55'),
(213, 'e_title', 'AnyDay Money Personal Loan', 'product-1', '2020-10-05 10:31:23', '2020-10-05 10:31:23'),
(214, 'e_title_second', 'Eligibility Criteria', 'product-1', '2020-10-05 10:31:23', '2020-10-05 10:31:23'),
(215, 'e_title', 'AnyDay Money Business Loan', 'product-2', '2020-10-05 10:33:52', '2020-10-05 10:40:29'),
(216, 'e_title_second', '- Eligibility Criteria', 'product-2', '2020-10-05 10:33:53', '2020-10-05 10:40:29'),
(217, 'features_title', 'AnyDay Business Loan', 'product-2', '2020-10-05 10:33:53', '2020-10-05 10:40:29'),
(218, 'features_title_second', '- Features and benefits', 'product-2', '2020-10-05 10:33:53', '2020-10-05 10:40:29'),
(219, 'e_title', 'AnyDay Money Medical Loan', 'product-3', '2020-10-05 10:37:36', '2020-10-05 10:37:36'),
(220, 'e_title_second', '- Eligibility Criteria', 'product-3', '2020-10-05 10:37:36', '2020-10-05 10:37:36'),
(221, 'features_title', 'AnyDay Medical Loan', 'product-3', '2020-10-05 10:37:36', '2020-10-05 10:37:36'),
(222, 'features_title_second', '- Features and benefits', 'product-3', '2020-10-05 10:37:36', '2020-10-05 10:37:36'),
(223, 'e_title', 'AnyDay Education Loan', 'product-4', '2020-10-05 10:42:28', '2020-10-05 10:42:28'),
(224, 'e_title_second', '- Features and benefits', 'product-4', '2020-10-05 10:42:28', '2020-10-05 10:42:28'),
(225, 'features_title', 'AnyDay Money Education Loan', 'product-4', '2020-10-05 10:42:28', '2020-10-05 10:42:28'),
(226, 'features_title_second', '- Features and benefits', 'product-4', '2020-10-05 10:42:28', '2020-10-05 10:42:28'),
(227, 'slider_5_main_title', 'Getting a loan is now', 'home-slider', '2020-10-05 10:49:52', '2020-10-05 10:49:52'),
(228, 'slider_5_main_title_2', 'easier and quicker with', 'home-slider', '2020-10-05 10:49:53', '2020-10-05 10:49:53'),
(229, 'slider_5_title', 'Anyday Money', 'home-slider', '2020-10-05 10:49:53', '2020-10-05 10:49:53'),
(230, 'slider_5_content_tile_1', 'Quick & Easy Loan application process', 'home-slider', '2020-10-05 10:49:53', '2020-10-05 10:49:53'),
(231, 'slider_5_tile_2', 'No repayment or foreclosure charges', 'home-slider', '2020-10-05 10:49:53', '2020-10-05 10:49:53'),
(232, 'slider_5_tile_3', 'Direct disbursement to bank account', 'home-slider', '2020-10-05 10:49:53', '2020-10-05 10:49:53'),
(233, 'slider_2_title_2', 'and grow your business?', 'home-slider', '2020-10-05 10:52:43', '2020-10-05 10:52:43'),
(234, 'banner_image', '1602952724.jpg', 'about-us', '2020-10-17 11:07:50', '2020-10-17 11:08:44'),
(236, 'banner_image', '1602953531.jpg', 'contact-us', '2020-10-17 11:21:38', '2020-10-17 11:22:11'),
(237, 'banner_image', '1602953989.jpg', 'terms-and-condition', '2020-10-17 11:29:50', '2020-10-17 11:29:50'),
(238, 'banner_image', '1602954119.jpg', 'privacy-policy', '2020-10-17 11:31:59', '2020-10-17 11:31:59');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `url` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `url`, `created_at`, `updated_at`) VALUES
(2, 'Personal Loan', 'personal-loan', '2020-10-17 10:32:04', '2020-10-17 10:40:32'),
(3, 'Business Loan', 'business-loan', '2020-10-17 10:32:17', '2020-10-17 10:40:28'),
(4, 'Medical Loan', 'medical-loan', '2020-10-17 10:32:45', '2020-10-17 10:40:24'),
(5, 'Education Loan', 'education-loan', '2020-10-17 10:32:58', '2020-10-17 10:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` int(11) NOT NULL,
  `product_id` text NOT NULL,
  `banner_image` text DEFAULT NULL,
  `main_title` text NOT NULL,
  `title` text NOT NULL,
  `sub_title` text DEFAULT NULL,
  `main_content_title` text DEFAULT NULL,
  `main_content` text DEFAULT NULL,
  `e_title` text DEFAULT NULL,
  `e_title_second` text DEFAULT NULL,
  `content_title` text DEFAULT NULL,
  `content_sub_title` text DEFAULT NULL,
  `features_title` text DEFAULT NULL,
  `features_title_second` text DEFAULT NULL,
  `feature_title` text DEFAULT NULL,
  `feature_sub_title` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `product_id`, `banner_image`, `main_title`, `title`, `sub_title`, `main_content_title`, `main_content`, `e_title`, `e_title_second`, `content_title`, `content_sub_title`, `features_title`, `features_title_second`, `feature_title`, `feature_sub_title`, `created_at`, `updated_at`) VALUES
(2, '5', '1603119714.jpg', 'Education Loans', '<p>Enabling higher education<br />\r\nto meet your life goals</p>', '', 'Education Loan', '<p>We all have dreams of higher education for ourselves or our family members which often face hurdles because of financial constraints.</p>\r\n\r\n<p>Now let that dream grow wings to fly towards a better future. Do not let these financial constraints become a barrier to meeting your or your child&rsquo;s career aspirations.</p>\r\n\r\n<p>Be it tuition fees or the living cost outside home, AnyDay Money Loans for Education helps you meet your short-term education related financial needs, thereby paying the way towards a better and confident future.</p>', 'AnyDay Money Education Loan', 'Eligibility Criteria', 'Eligible=Minimum Age=Minimum Salary Required=Loan Amount', '<p>Salaried Individuals</p>=<p>21 or above</p>=<p>Rs. 15,000</p>=<p>Rs. 10,000 onwards</p>', 'Education Loan\'s', 'Features and benefits', 'No Fore-closure Charges=Easy Digital Loan Application=Instant Disbursal=Flexible Tenure=No Pre-payment Charges=Quick Approvals', '<p>Now save money by prepaying at your convenience<br />\r\nwith no extra charge, unlike traditional banks/NBFC</p>=<p>Apply online through either Mobile Application or our<br />\r\nWebsite within minutes</p>=<p>Instant Disbursal to your bank account post approval</p>=<p>Choose your loan tenure as per your convenience</p>=<p>Pay in parts as per your convenience</p>=<p>Digital verification process for faster loan approval</p>', '2020-10-19 09:31:54', '2020-10-19 16:19:27'),
(3, '4', '1603119946.jpg', 'Medical Loans', '<p>Sudden medical emergencies?</p>', 'Take care of your loved ones while we take care of your financial worries', 'Medical Loan', '<p>Emergency situations can be unpredictable and in times of unforeseen medical emergencies, money should never come in way of treatments.<br />\r\nGetting hassle free funds should be the priority.</p>\r\n\r\n<p>AnyDay Money Loans for medical emergencies ensures that the financial worries at such difficult times are lifted off your shoulders so that you<br />\r\nget all the time in the world to focus on the health and care of your loved ones.</p>\r\n\r\n<p>Click the link below to apply and let money be the least of your worries.</p>', 'AnyDay Money Medical Loan', 'Eligibility Criteria', 'Eligible=Minimum Age=Minimum Salary Required=Loan Amount', '<p>Salaried / Non salaried<br />\r\nIndividuals</p>=<p>21 or above</p>=<p>Rs. 15,000 per month</p>=<p>Rs. 10,000 onwards</p>', 'AnyDay Medical Loan', 'Features and benefits', 'No Fore-closure Charges=Easy Digital Loan Application=Instant Disbursal=Flexible Tenure=No Pre-payment Charges=Quick Approvals', '<p>Now save money by prepaying at your convenience<br />\r\nwith no extra charge, unlike traditional banks/NBFC</p>=<p>Apply online through either Mobile Application or our<br />\r\nWebsite within minutes</p>=<p>Instant Disbursal to your bank account post approval</p>=<p>Choose your loan tenure as per your convenience</p>=<p>Pay in parts as per your convenience</p>=<p>Digital verification process for faster loan approval</p>', '2020-10-19 09:35:46', '2020-10-19 10:55:44'),
(4, '3', '1603120067.jpg', 'Business Loans', '<p>Need funds to manage<br />\r\nand grow your business?</p>', 'Apply for quick business loans', 'Business Loan', '<p>Most small and medium business often need short-term loans to meet their working capital requirements or for business expansion.</p>\r\n\r\n<p>Now getting that much needed business loan is just a click away! Our specially crafted business loans will give your business the boost that is required.</p>\r\n\r\n<p>AnyDay Business Loans removes the hassles involved in traditional loans through a completely digital lending process from application to disbursement thereby helping you grow your business faster.</p>', 'AnyDay Money Business Loan', 'Eligibility Criteria', 'Loan Purpose=Minimum Age=Loan Amount=', '<p>Working Capital</p>\r\n\r\n<p>Business Expansion</p>\r\n\r\n<p>Takeover of Existing<br />\r\nhigh cost Loans</p>=<p>21 to 65</p>=<p>Rs. 50,000 onwards</p>=', 'AnyDay Business Loan', 'Features and benefits', 'No Fore-closure Charges=Easy Digital Loan Application=Instant Disbursal=Flexible Tenure=No Pre-payment Charges=Quick Approvals', '<p>Now save money by prepaying at your convenience<br />\r\nwith no extra charge, unlike traditional banks/NBFC</p>=<p>Apply online through either Mobile Application or our<br />\r\nWebsite within minutes</p>=<p>Instant Disbursal to your bank account post approval</p>=<p>Choose your loan tenure as per your convenience</p>=<p>Pay in parts as per your convenience</p>=<p>Digital verification process for faster loan approval</p>', '2020-10-19 09:37:47', '2020-10-19 10:57:31'),
(5, '2', '1603120180.jpg', 'Personal Loans', '<p>Stressed over high interest<br />\r\non Credit Card dues?</p>', 'Avail quick and affordable loans from AnyDay Money', 'Personal Loan', '<p>Mid-month financial crisis can become a problem in situations where you need to pay school fees, medical emergencies, family functions, unplanned holiday trips or even that luxury item that you wanted to have in your home.</p>\r\n\r\n<p>AnyDay Money loans are specially tailored to meet the needs of salaried individuals and helps you tide over your mid-month planned or unplanned short-term financial needs.</p>', 'AnyDay Money Personal Loan', 'Eligibility Criteria', 'Eligible=Minimum Age=Minimum Salary Required=Loan Amount', '<p>Salaried Individuals</p>=<p>21 years and above</p>=<p>Rs. 15,000 per month</p>=<p>Rs. 5,000 onwards</p>', 'Personal Loan’s', 'Features and benefits', 'No Fore-closure Charges=Easy Digital Loan Application=Instant Disbursal=Flexible Tenure=No Pre-payment Charges=Quick Approvals', '<p>Now save money by prepaying at your convenience<br />\r\nwith no extra charge, unlike traditional banks/NBFC</p>=<p>Apply online through either Mobile Application or our<br />\r\nWebsite within minutes</p>=<p>Instant Disbursal to your bank account post approval</p>=<p>Choose your loan tenure as per your convenience</p>=<p>Pay in parts as per your convenience</p>=<p>Digital verification process for faster loan approval</p>', '2020-10-19 09:39:40', '2020-10-19 10:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `content` text NOT NULL,
  `rating` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `content`, `rating`, `created_at`, `updated_at`) VALUES
(2, 'Mahesh Bhosale', '<p>Very efficient and excellent service and really helpful application when you need money on urgent basis. Excellent app really helpful.</p>', '5', '2020-10-17 04:13:27', '2020-10-17 04:13:27'),
(3, 'Sourav Tiwari', '<p>This app is genuine and people are really helpful. They would understand your need and go extra mile to assist you.Super Awesome! Keep up the good work!</p>', '5', '2020-10-17 04:14:00', '2020-10-17 04:14:00'),
(4, 'Monika Shah', '<p>Great App to apply personal loans for salaried class. Simple user interface and great customer service. Credit staff user friendly.</p>', '5', '2020-10-17 04:14:27', '2020-10-17 04:14:27'),
(5, 'Rahul Devan', '<p>Super awesome credit services or I would say one of the best services so far. Just one phone call and meet up with documents and all was done in just 24hrs and the amount was in my account .....a big thank you once again</p>', '5', '2020-10-17 04:14:51', '2020-10-17 04:14:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply_nows`
--
ALTER TABLE `apply_nows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_forms`
--
ALTER TABLE `contact_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_sliders`
--
ALTER TABLE `home_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply_nows`
--
ALTER TABLE `apply_nows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_forms`
--
ALTER TABLE `contact_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
