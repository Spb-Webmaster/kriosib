export function print_price() {


        //DivID
    $('body').on('click', '.PrintMe__js', function (event) {

        alert('xzz');

        var DivID = 'print_price';
        var disp_setting = "toolbar=yes,location=no,";
        disp_setting += "directories=yes,menubar=yes,";
        disp_setting += "scrollbars=yes,width=1200, height=650, left=100, top=25";
        var content_vlue = document.getElementById(DivID).innerHTML;
        var docprint = window.open("", "", disp_setting);
        docprint.document.open();
        docprint.document.write('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"');
        docprint.document.write('"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">');
        docprint.document.write('<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">');
        docprint.document.write('<head><title>Печать прайса</title>');
        docprint.document.write('<style type="text/css">body{ margin:0; padding: 20px;');
        docprint.document.write('font-family:Arial; color:#000;');
        docprint.document.write('font-size:15px}');
        docprint.document.write('h2{color: #e9292a}');
        docprint.document.write('.th_ {min-height: 50px; border-bottom: 1px solid #c7c7c8;  border-top: 1px solid #c7c7c8; background: #fff; display: flex; justify-content: space-between; align-items: center;}');
        docprint.document.write('.tr_ {padding:10px 0 ; min-height: 50px; border-bottom: 1px solid #c7c7c8; background-color: #f5f5f5; display: flex; justify-content: space-between; align-items: top; }');
        docprint.document.write('.tr_ .td__1, .th_ .td__1 {font-size: 16px; line-height: 1.3; padding: 0 10px; width: 65px; text-align: center; }');
        docprint.document.write('.tr_ .td__2, .th_ .td__2  {text-align: left; font-size: 17px; line-height: 1.2; padding: 0 10px; width: 775px; }');
        docprint.document.write('.tr_ .td__3 {font-size: 17px; line-height: 1.3;  padding: 0 10px; width: 140px;  text-align: center; }');
        docprint.document.write('.th_ .td__3  {font-size: 13px; line-height: 1.3;  padding: 0 10px; width: 140px;  text-align: center; }');
        docprint.document.write('.tr_ .td__4 {font-size: 17px; line-height: 1.3;  padding: 0 10px; width: 120px;  text-align: center; }');
        docprint.document.write('.th_ .td__4  {font-size: 13px; line-height: 1.3;  padding: 0 10px; width: 120px;  text-align: center; }');
        docprint.document.write('.contener__222 { padding:20px 0}');
        docprint.document.write('a{display:none} </style>');
        docprint.document.write('</head><body onLoad="self.print()">');
        docprint.document.write(content_vlue);
        docprint.document.write('</body></html>');
        docprint.document.close();
        docprint.focus();

    });
}
