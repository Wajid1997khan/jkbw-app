<?php
# Author  :WAJID ALI JAVID KHAN
# Created :31 July 2025
# Description : This class has all Language Arabic and English and Urdu
class LANG{
	public static function Data($String,$All=''){
		$Fun = $_COOKIE['_LANG_'];
		return self::$Fun($String,$All);
	}//Closed Func.
		
	public static function EN($Srting,$All=''){	
		$Lang['dir'] = 'ltr';

		#Buttons
		$Lang['Create'] = 'Create';
		$Lang['Submit'] = 'Submit';
		$Lang['Save'] = 'Save';
		$Lang['Edit'] = 'Edit';
		$Lang['View'] = 'View';
		$Lang['Cancel'] = 'Cancel';
		$Lang['Update'] = 'Update';
		$Lang['Reset'] = 'Reset';

		#validation or alert Messages
		$Lang['Looksgood'] = 'Looks good!';
		$Lang['PleaseselectavalidClass'] = 'Please select a valid Class.';
		$Lang['Enterclassnametofilter'] = 'Enter class name';
		$Lang['EnterStudentCode'] = 'Enter Student Code';
		$Lang['Pleaseselectavalidbook'] = 'Please select a valid Book.';
		$Lang['ResultGeneratedbook'] = 'The result has already been generated for this book. Thank you!';
		$Lang['EnterBookMarks'] = 'enter Book marks';
		$Lang['Pleaseselectresulttype'] = 'Please select result type';
		$Lang['Enteredmarksexceedthebooktotalmarks'] = 'Entered marks exceed the book total marks.';
		$Lang['InvalidMarksEntered'] = 'Invalid Marks Entered';
		$Lang['EnterClassCode'] = 'Enter Class Code.';

		#Header
		$Lang['ChooseLanguage'] = 'Choose Language';
		$Lang['JKBW'] = 'JKBW';
		$Lang['Urdu'] = 'Urdu';
		$Lang['English'] = 'English';
		
		#asidenav
		$Lang['Dashboard'] = 'Dashboard';
		$Lang['Curriculum'] = 'Curriculum';
		$Lang['AddClass'] = 'Add Class';
		$Lang['Classes'] = 'Classes';
		$Lang['AddBook'] = 'Add Book';
		$Lang['Books'] = 'Books';
		$Lang['Students'] = 'Students';
		$Lang['Admission'] = 'Admission';

		#Students (EN)
		$Lang['AllClasses'] = 'All Classes';
		$Lang['ClassCode'] = 'Class Code';
		$Lang['NameEnglish'] = 'Name (English)';
		$Lang['NameUrdu'] = 'Name (Urdu)';
		$Lang['AllStudents'] = 'All Students';
		$Lang['DismissedStudents'] = 'Dismissed Students';
		$Lang['StudentCode'] = 'Student Code';
		$Lang['FatherName'] = 'Father Name'; 
		$Lang['BrithDate'] = 'Brith Date';
		$Lang['Gender'] = 'Gender';
		$Lang['Address'] = 'Address';
		$Lang['City'] = 'City';
		$Lang['Mobile'] = 'Mobile';
		$Lang['Male'] = 'Male';
		$Lang['Active'] = 'Active';
		$Lang['Status'] = 'Status';
		$Lang['No'] = 'No';
		
		#Admission (EN)
		$Lang['FirstNameEnglish'] = 'First Name (English)';
		$Lang['FirstNameUrdu'] = 'First Name (Urdu)';
		$Lang['LastNameEnglish'] = 'Last Name (English)';
		$Lang['LastNameUrdu'] = 'Last Name (Urdu)';
		$Lang['PleaseEnterFirstNameEnglish'] = 'Please enter First Name (English)';
		$Lang['PleaseEnterFirstNameUrdu'] = 'Please enter First Name (Urdu)';
		$Lang['PleaseEnterLastNameEnglish'] = 'Please enter Last Name (English)';
		$Lang['PleaseEnterLastNameUrdu'] = 'Please enter Last Name (Urdu)';
		$Lang['MobileNumber'] = 'Mobile Number';
		$Lang['Pleaseenteravalidmobilenumber'] = 'Please enter a valid mobile number.';
		$Lang['Email'] = 'Email';
		$Lang['Pleaseenteravalidemail'] = 'Please enter a valid email.';
		$Lang['DateofBirth'] = 'Date of Birth';
		$Lang['Pleaseselectdateofbirth'] = 'Please select date of birth.';
		$Lang['AdmissionwithStudentCode'] = 'Admission with Student Code';
		$Lang['NewAdmission'] = 'New Admission';
		$Lang['ChooseAdmissionType'] = 'Choose Admission Type';
		$Lang['FatherNameEnglish'] = 'Father Name (English)';
		$Lang['FatherNameUrdu'] = 'Father Name (Urdu)';
		$Lang['MonthlyFinancialSupport'] = 'Monthly Financial Support';
		$Lang['ResidenceStatus'] = 'Residence Status';
		$Lang['Resident'] = 'Resident';
		$Lang['NonResident'] = 'Non-Resident';
		$Lang['PermanentAddress'] = 'Permanent Address';
		$Lang['TemporaryAddress'] = 'Temporary Address';
		$Lang['CNICNumber'] = 'CNIC Number';
		$Lang['PleaseEnterValidCNIC'] = 'Please enter a valid CNIC number (e.g., 12345-1234567-1)';
		$Lang['PreviousMadrasa'] = 'Previous Madrasa';
		$Lang['StudentDetails'] = 'Student Details';
		$Lang['Guardian'] = 'Guardian';
		$Lang['GuardianMobileNumber'] = 'Guardian Mobile Number';
		$Lang['GuardianCNICNumber'] = 'Guardian CNIC Number';
		$Lang['AdmissionNo'] = 'Admission No';
		$Lang['Action'] = 'Action';
		$Lang['AdmissionList'] = 'Admission List';
		$Lang['StudentType'] = 'Student Type';
		$Lang['StudentTypeNew'] = 'New';
		$Lang['StudentTypeOld'] = 'Old';
	
		#books
		$Lang['BookNameEnglish'] = 'Book Name (English)';
		$Lang['BookNameUrdu'] = 'Book Name (Urdu)';
		$Lang['SerialNum'] = 'Serial Num';
		$Lang['AllBooks'] = 'All Books';
		$Lang['Class'] = 'Class';
		$Lang['Choose'] = 'Choose...';

		#Week Days			
		$Lang['Sunday'] = 'Sunday';
		$Lang['Monday'] = 'Monday';
		$Lang['Tuesday'] = 'Tuesday';
		$Lang['Wednesday'] = 'Wednesday';
		$Lang['Thursday'] = 'Thursday';
		$Lang['Friday'] = 'Friday';
		$Lang['Saturday'] = 'Saturday';

		#Dashboard
		$Lang['ThisYear'] = 'This Year';
		$Lang['Total'] = 'Total';
		$Lang['increase'] = 'increase';
		$Lang['decrease'] = 'decrease';
		$Lang['Top10Students'] = 'Top 10 Students';
		$Lang['P3'] = 'ps-3';
		$Lang['Destiny'] = 'Destiny';
		$Lang['Quality'] = 'Quality';
		$Lang['Position'] = 'Position';
		$Lang['Name'] = 'Name';
		$Lang['Percentage'] = 'Percentage';
		$Lang['Marks'] = 'Marks';

		#Results
		$Lang['Results'] = 'Results';
		$Lang['NewResults'] = 'New Results';
		$Lang['AllResults'] = 'All Results';
		$Lang['CreateResults'] = 'Create New Results';
		$Lang['Book'] = 'Book';
		$Lang['BookMarks'] = 'Book Marks';
		$Lang['ObtainedMarks'] = 'Obtained Marks';

		$Lang['ExamType'] = 'Exam Type';
		$Lang['BiMonthlyExam'] = 'Bi-Monthly Exam';
		$Lang['QuarterlyExam'] = 'Quarterly Exam';
		$Lang['MidtermExam'] = 'Midterm Exam';
		$Lang['AnnualExam'] = 'Annual Exam';
		
		if(!empty($All)) return $Lang;
		if( !empty($Lang[$Srting]) ) return $Lang[$Srting]; else return $Srting;
	}//Close func.
	
	public static function UR($Srting,$All=''){
		$Lang['dir'] = 'rtl';

		#Buttons
		$Lang['Create'] = 'بنائیں';
		$Lang['Submit'] = 'جمع کروائیں';
		$Lang['Save'] = 'محفوظ کریں';
		$Lang['Edit'] = 'ترمیم کریں';
		$Lang['View'] = 'دیکھیں';
		$Lang['Cancel'] = 'منسوخ کر دیں';
		$Lang['Update'] = 'اپ ڈیٹ';
		$Lang['Reset'] = 'دوبارہ ترتیب دیں';

		#validation or alert Messages
		$Lang['Looksgood'] = 'اچھی لگ رہی ہے!';
		$Lang['Enterclassnametofilter'] = 'کلاس کا نام درج کریں';
		$Lang['EnterStudentCode'] = 'رقم التسجیل درج کریں';
		$Lang['Pleaseselectavalidbook'] = 'براہ کرم ایک درست کتاب منتخب کریں۔';
		$Lang['PleaseselectavalidClass'] = 'براہ کرم ایک درست کلاس منتخب کریں۔';
		$Lang['ResultGeneratedbook'] = 'اس کتاب کے لیے نتیجہ پہلے ہی تیار کیا جا چکا ہے۔ شکریہ!';
		$Lang['EnterBookMarks'] = 'کتاب کے نمبر درج کریں';
		$Lang['Pleaseselectresulttype'] ='نتیجے کی نوعیت منتخب کریں';
		$Lang['Enteredmarksexceedthebooktotalmarks'] = 'درج کردہ نمبر کتاب کے کل نمبروں سے زیادہ ہیں۔';
		$Lang['InvalidMarksEntered'] = 'غلط نمبرز داخل کیے گئے ہیں';
		$Lang['EnterClassCode'] = 'کلاس کوڈ درج کریں';
		
		#header
		$Lang['ChooseLanguage'] = 'زبان منتخب کریں';
		$Lang['JKBW'] = 'جامعہ خالد بن ولیدؓ';
		$Lang['Urdu'] = 'اردو';
		$Lang['English'] = 'انگریزی';

		#asidenav
		$Lang['Dashboard'] = 'ڈیش بورڈ';
		$Lang['Curriculum'] = 'نصاب';
		$Lang['AddClass'] = 'نئی کلاس بنائیں';
		$Lang['Classes'] = 'کلاسز';
		$Lang['AddBook'] = 'نئی کتاب کا اضافہ';
		$Lang['Books'] = 'کتابیں';
		$Lang['Students'] = 'طلباء';
		$Lang['Admission'] = 'داخلہ';

		#Students (UR)
		$Lang['AllClasses'] = 'تمام کلاسز';
		$Lang['ClassCode'] = 'کلاس کوڈ';
		$Lang['NameEnglish'] = 'نام (انگریزی)';
		$Lang['NameUrdu'] = 'نام (اردو)';
		$Lang['AllStudents'] = 'تمام طلباء';
		$Lang['DismissedStudents'] = 'خارج شدہ طلباء';
		$Lang['StudentCode'] = 'رقم التسجیل';
		$Lang['FatherName'] = 'والد کا نام'; 
		$Lang['BrithDate'] = 'تاریخِ پیدائش';
		$Lang['Gender'] = 'جنس';
		$Lang['Address'] = 'پتہ';
		$Lang['City'] = 'شہر';
		$Lang['Mobile'] = 'موبائل';
		$Lang['Male'] = 'مرد';
		$Lang['Active'] = 'زیرِ تعلیم';
		$Lang['Status'] = 'موجودہ حالت';
		$Lang['No'] = 'نمبر';
		
		#Admission (UR)
		$Lang['FirstNameEnglish'] = 'پہلا نام (انگریزی)';
		$Lang['FirstNameUrdu'] = 'پہلا نام (اردو)';
		$Lang['LastNameEnglish'] = 'آخری نام (انگریزی)';
		$Lang['LastNameUrdu'] = 'آخری نام (اردو)';
		$Lang['PleaseEnterFirstNameEnglish'] = 'براہ کرم پہلا نام (انگریزی) درج کریں';
		$Lang['PleaseEnterFirstNameUrdu'] = 'براہ کرم پہلا نام (اردو) درج کریں';
		$Lang['PleaseEnterLastNameEnglish'] = 'براہ کرم آخری نام (انگریزی) درج کریں';
		$Lang['PleaseEnterLastNameUrdu'] = 'براہ کرم آخری نام (اردو) درج کریں';
		$Lang['MobileNumber'] = 'موبائل نمبر';
		$Lang['Pleaseenteravalidmobilenumber'] = 'براہ کرم درست موبائل نمبر درج کریں۔';
		$Lang['Email'] = 'ای میل';
		$Lang['Pleaseenteravalidemail'] = 'براہ کرم درست ای میل درج کریں۔';
		$Lang['DateofBirth'] = 'تاریخ پیدائش';
		$Lang['Pleaseselectdateofbirth'] = 'براہ کرم تاریخ پیدائش منتخب کریں۔';
		$Lang['AdmissionwithStudentCode'] = 'داخلہ بذریعہ رقم التسجیل';
		$Lang['NewAdmission'] = 'داخلہ بغیر رقم التسجیل';
		$Lang['ChooseAdmissionType'] = 'داخلے کی قسم منتخب کریں';
		$Lang['FatherNameEnglish'] = 'والد کا نام (انگریزی)';
		$Lang['FatherNameUrdu'] = 'والد کا نام (اردو)';
		$Lang['MonthlyFinancialSupport'] = 'ماہانہ مالی تعاون';		
		$Lang['ResidenceStatus'] = 'رہائش کی حالت';
		$Lang['Resident'] = 'مقیم';
		$Lang['NonResident'] = 'غیر مقیم';
		$Lang['PermanentAddress'] = 'مستقبل پتہ';
		$Lang['TemporaryAddress'] = 'عارضی پتہ';
		$Lang['CNICNumber'] = 'شناختی کارڈ نمبر';
		$Lang['PleaseEnterValidCNIC'] = 'براہ کرم درست شناختی کارڈ نمبر درج کریں (مثال: 12345-1234567-1)';
		$Lang['PreviousMadrasa'] = 'سابقہ مدرسہ';
		$Lang['StudentDetails'] = 'کوائف طالب العلم';
		$Lang['Guardian'] = 'سرپرست';
		$Lang['GuardianMobileNumber'] = 'سرپرست کا موبائل نمبر';
		$Lang['GuardianCNICNumber'] = 'سرپرست کا شناختی کارڈ نمبر';
		$Lang['AdmissionNo'] = 'داخلہ نمبر';
		$Lang['Action'] = 'عمل';
		$Lang['AdmissionList'] = 'داخلہ فہرست';
		$Lang['StudentType'] = 'طالب علم کی قسم';
		$Lang['StudentTypeNew'] = 'نیا طالب علم';
		$Lang['StudentTypeOld'] = 'پرانا طالب علم';



		#books
		$Lang['BookNameEnglish'] = 'کتاب کا نام (انگریزی)';
		$Lang['BookNameUrdu'] = 'کتاب کا نام (اردو)';
		$Lang['SerialNum'] = 'نمبر شمار';
		$Lang['AllBooks'] = 'تمام کتابیں';
		$Lang['Class'] = 'درجہ';
		$Lang['Choose'] = 'منتخب کریں...';

		#Week Days			
		$Lang['Sunday'] = 'Sunday';
		$Lang['Monday'] = 'Monday';
		$Lang['Tuesday'] = 'Tuesday';
		$Lang['Wednesday'] = 'Wednesday';
		$Lang['Thursday'] = 'Thursday';
		$Lang['Friday'] = 'Friday';
		$Lang['Saturday'] = 'Saturday';

		#Dashboard
		$Lang['ThisYear'] = 'اس سال';
		$Lang['Total'] = 'ٹوٹل';
		$Lang['increase'] = 'اضافہ';
		$Lang['decrease'] = 'کمی';
		$Lang['Top10Students'] = 'ٹاپ 10 طالب علم';
		$Lang['P3'] = 'pe-3';
		$Lang['Destiny'] = 'تقدیر';
		$Lang['Quality'] = 'کیفیت';
		$Lang['Position'] = 'پوزیشن';
		$Lang['Name'] = 'نام';
		$Lang['Percentage'] = 'فیصد';
		$Lang['Marks'] = 'مارکس';

		#Results
		$Lang['Results'] = 'نتائج';
		$Lang['NewResults'] = 'نئے نتائج';
		$Lang['AllResults'] = 'تمام نتائج';
		$Lang['CreateResults'] = 'نئے نتائج بنائیں';
		$Lang['Book'] = 'کتاب';
		$Lang['BookMarks'] = 'کتاب کے نمبر';
		$Lang['ObtainedMarks'] = 'حاصل کردہ نمبر';

		$Lang['ExamType'] = 'امتحانات کی اقسام';
		$Lang['BiMonthlyExam'] = 'دوماہی امتحان';
		$Lang['QuarterlyExam'] = 'چہارماہی امتحان';
		$Lang['MidtermExam'] = 'ششماہی امتحان';
		$Lang['AnnualExam'] = 'سالانہ امتحان';
		
		if(!empty($All)) return $Lang;
		if( !empty($Lang[$Srting]) ) return $Lang[$Srting]; else return $Srting;
	}//close function
	
}//End Class