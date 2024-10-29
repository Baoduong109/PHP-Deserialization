# Write-Up Pokemon (PHP Deserialization)

Vì muốn trở thành là nhà vô địch thi đấu pokemon xuất sắc nhất thế giới nên mình đã lên đường đi chinh phục các pokemon mạnh nhất.

Để bắt đầu, ta khởi động docker và truy cập vào http://localhost:15001 để bắt đầu. Đây là giao diện chính khi ta truy cập vào trang web.

<img width="1440" alt="Ảnh chụp Màn hình 2024-10-28 lúc 13 15 38" src="https://github.com/user-attachments/assets/14ca069c-639d-4a14-b5b8-83543c97b430">

Chọn New Game và đăng kí tài khoản, sau đó đăng nhập và bắt đầu trò chơi. 

Đầu tiên ta sẽ đặt tên cho pokemon và chọn pokemon ta yêu thích.

<img width="1403" alt="Bản sao Ảnh chụp Màn hình 2024-10-28 lúc 13 16 41" src="https://github.com/user-attachments/assets/7ed5cfb8-3454-4f00-9cf0-21786ec8e84e">

Start game. Sau khi dạo quanh ở map1, mình không thấy có gì đặt biệt ngoài việc đi đánh nhau với các pokemon.

<img width="1423" alt="Ảnh chụp Màn hình 2024-10-28 lúc 13 19 22" src="https://github.com/user-attachments/assets/fa67b27e-4c83-4e86-9b66-8d41dddebc0e">

Ta có thể chọn Fight nếu ta thấy có thể đánh thắng được pokemon hoặc Run nếu chúng có thuộc tính mạnh hơn ta. 

Sau khi đánh nhau chán thì mình đến chỗ ông lão đang đợi để xem ông có cho ta thông tin gì đặc biệt hay không.

<img width="998" alt="Ảnh chụp Màn hình 2024-10-28 lúc 13 19 05" src="https://github.com/user-attachments/assets/5de1f186-6c8c-4745-bc44-fe4fcf144747">

Sau khi trò chuyện thì ông muốn mình rời đi ngay bây giờ và ông đưa mình 1 đường link dẫn đến map2.

<img width="1147" alt="Ảnh chụp Màn hình 2024-10-28 lúc 13 20 22" src="https://github.com/user-attachments/assets/e1c0de6e-84cd-4c1c-ae46-81f211784075">

Vào map2 thì đập vào mắt mình là 1 con Boss trông có vẻ khá mạnh, mình tiến thẳng đến nó để combat luôn vì mình muốn khẳng định mình là 1 người chơi pokemon mạnh nhất.

<img width="1407" alt="Ảnh chụp Màn hình 2024-10-28 lúc 13 20 38" src="https://github.com/user-attachments/assets/a64d3898-5921-40a6-b507-ba6c818d6af8">

Nhưng với chỉ số vượt trội hơn hẳng mình hằng chục lần nên mình không thể đánh bại con Boss này. Mình nghĩ sẽ có cách nào khác để đánh bại được con Boss, lúc này mình đi tìm các chức năng có trong trang web xem có thể lấy được thông tin gì không.

<img width="1438" alt="Ảnh chụp Màn hình 2024-10-28 lúc 13 26 23" src="https://github.com/user-attachments/assets/42501475-8e4c-49d9-8db4-35cb9338cfcf">

Có các chức năng như ```How to play``` ```View Info``` ```Load Game``` và ```Save Game```.

Đây là ```View Info```

<img width="1440" alt="Ảnh chụp Màn hình 2024-10-28 lúc 13 26 46" src="https://github.com/user-attachments/assets/0026dae3-2711-4eaf-a8bf-84f07f8b51c9">

Khi chọn vào ```Save Game``` thì ta sẽ được tải về 1 file ```pokemon.sav```, mở lên thì ta nhận được 1 đoạn mã sau:

<img width="1041" alt="Ảnh chụp Màn hình 2024-10-28 lúc 13 30 46" src="https://github.com/user-attachments/assets/a59490fe-32ba-4044-ae33-d55bb71c6a93">

Nhìn có vẻ hơi rối nên ta cần phải tìm hiểu đoạn mã trên là gì. Thì theo mình tìm hiểu, đoạn mã trên được gọi là Serialize data (phần này mọi người nên tìm hiểu thêm)

<img width="786" alt="Ảnh chụp Màn hình 2024-10-28 lúc 14 02 52" src="https://github.com/user-attachments/assets/6a422484-2dcf-4686-beea-11dc7877f2e6">

Quá trình dịch cấu trúc dữ liệu hoặc trạng thái đối tượng sang định dạng có thể được lưu trữ hoặc truyền đi và tái tạo lại sau này. Khi chuỗi bit kết quả được đọc lại theo định dạng tuần tự hóa, nó có thể được sử dụng để tạo một bản sao giống hệt về mặt ngữ nghĩa của đối tượng ban đầu.

Vậy khi nhìn kĩ vào đoạn mã trên, ta sẽ thấy được các thuộc tính của pokemon của mình như ```health``` ```damage```. Vậy sẽ ra sao nếu mình thay đổi 2 thuộc tính này làm cho damage và health cao hơn con Boss kia.

<img width="1015" alt="Ảnh chụp Màn hình 2024-10-28 lúc 14 05 17" src="https://github.com/user-attachments/assets/7be99be3-c5a5-41b2-a897-cd0b9daf58b3">

Mình đã thay đổi damage và health trong file ```pokemon.sav``` và chọn phần ```Load Game``` để upload file này lên.

<img width="1400" alt="Ảnh chụp Màn hình 2024-10-28 lúc 14 05 38" src="https://github.com/user-attachments/assets/3664ade2-6702-48d7-b131-a5085aa8b49b">

Thông báo Load successfully, mình tiến thẳng đến con Boss và bùmmm.

<img width="1380" alt="Ảnh chụp Màn hình 2024-10-28 lúc 14 05 49" src="https://github.com/user-attachments/assets/b3aa151f-bd66-4ee5-bc98-9116b984bfaf">

Bây giờ mình đã mạnh hơn rất nhiều so với con Boss và dễ dàng đánh thắng được nó và lấy được Flag.

<img width="1422" alt="Ảnh chụp Màn hình 2024-10-28 lúc 14 06 04" src="https://github.com/user-attachments/assets/774bdf95-7438-4c02-a203-7024d9460298">

Sau khi đánh thắng con Boss ở map2 thì mình sẽ tiến đến 1 con Boss ở map3. Như thường lệ mình sẽ đến thằng con Boss, vì mình vừa được buff sức mạnh và máu vô hạn nên mình sẽ chả sợ bất kì con Boss nào.

Nhưng sau khi đến thì mình nhận được bất ngờ.

<img width="1440" alt="Ảnh chụp Màn hình 2024-10-28 lúc 14 06 27" src="https://github.com/user-attachments/assets/60fa40c2-a9fc-400e-92eb-8757718bc91b">

Máu và sức mạnh của pokemon mình bị giảm về 1. Mình thử upload lại file lúc nãy nhưng kết quả vẫn không đổi. Lúc này mình nghĩ rằng con Boss này có chỉ số ẩn khiến cho pokemon mình yếu đi. Mình sẽ vào xem source code xem chỉ số đó là gì.

<img width="1140" alt="Ảnh chụp Màn hình 2024-10-28 lúc 14 07 06" src="https://github.com/user-attachments/assets/b95db2f5-9adc-405d-be26-afcb80b7bd19">

Đúng như mình nghĩ, anh dev đã lập trình cho con Boss này 1 kỹ năng đặc biệt là giảm sát thương và máu của pokemon mình về 1 (dòng 44, 45).
Vậy có cách nào để đánh thắng con Boss này không?

Tất nhiên là có, ngoài thay đổi thuộc tính thì ta có thể thay đổi luôn Class của Object. Vậy mình sẽ tìm 1 Class nào đó có trong này để có thể đánh bại được con Boss này. Sau khi tìm kiếm thì mình thấy 1 Class trong file ```trainer.php``` là ```TrumCuoi``` được kế thừa từ Class ```Trainer```.

<img width="1180" alt="Ảnh chụp Màn hình 2024-10-28 lúc 14 07 54" src="https://github.com/user-attachments/assets/885e5a58-dce2-4782-bb72-b8fbf914b312">

Truy cập vào file ```pokemon.sav``` và thay đổi Class ```Trainer``` thành ```TrumCuoi``` và thay đổi luôn số kí tự ở trước Class thành ```8```.

Payload sẽ là:

<img width="1050" alt="Ảnh chụp Màn hình 2024-10-28 lúc 14 08 42" src="https://github.com/user-attachments/assets/0309432a-828a-4e19-a272-b7d7be886445">

Sau đó Load Game.

<img width="1440" alt="Ảnh chụp Màn hình 2024-10-28 lúc 14 09 13" src="https://github.com/user-attachments/assets/b35e128d-e8fb-4966-b86c-c9de55db2dff">

Không có gì thay đổi cả nhưng khi ta Fight thì con Boss đã bị mình đánh bại.

<img width="1439" alt="Ảnh chụp Màn hình 2024-10-28 lúc 14 09 24" src="https://github.com/user-attachments/assets/0c3b8f1d-684c-4703-b5bb-701589a099a5">

Thu thập được Flag khi đánh bại Boss ở map3 và đi thẳng đến map4.

<img width="1437" alt="Ảnh chụp Màn hình 2024-10-28 lúc 14 09 46" src="https://github.com/user-attachments/assets/55b86458-255e-4ee0-ad92-e547c77755df">

Có vẻ như nhiệm vụ chính của map này là giải cứu công chúa.

<img width="1202" alt="Ảnh chụp Màn hình 2024-10-28 lúc 14 10 01" src="https://github.com/user-attachments/assets/e328f3e6-6d55-4c73-b57e-b46fb2416f9a">

Như mọi cô công chúa khác, để công chúa đi theo mình thì công chúa yêu cầu bí mật có trong server. Vậy nếu muốn có được bí mật trong server thì có nghĩa ta cần phải RCE được server này.

Sau khi tìm kiếm trong source thì ta thấy 1 Class tên là ```Caculator``` trong file ```utils.php``` có sử dụng 1 function ```run``` và hàm ```eval()```.

<img width="1172" alt="Ảnh chụp Màn hình 2024-10-28 lúc 14 11 38" src="https://github.com/user-attachments/assets/cd8c409a-57ee-4f36-b93b-b2dab004cea4">

Theo tìm hiểu thì hàm ```eval()``` sẽ đánh giá 1 chuỗi dưới dạng mã ```PHP```. Chuỗi phải là mã ```PHP``` hợp lệ và được kết thúc bởi dấu chấm phẩy.

Vậy còn ```run```, làm thế nào để có thể gọi function này. Ở những trận combat trước, mọi người đều sử dụng đến 2 đối tượng này đó là ```Fight``` và ```Run```.

<img width="179" alt="Ảnh chụp Màn hình 2024-10-28 lúc 19 37 11" src="https://github.com/user-attachments/assets/afa0a6d5-749f-480d-8499-9c952d6bf792">

Bây giờ có thể tiến hành tạo payload để có thể RCE và giải cứu công chúa.

Chọn chuột phải vào thư mục ```src```, chọn ```New File...``` và tạo 1 file mới có tên ```payload.php```, file này sẽ giúp chúng ta tạo payload.
Sau đó, copy toàn bộ code của Class ```Caculator``` vào tệp ```payload.php``` và làm theo các bước bên dưới.

<img width="911" alt="Ảnh chụp Màn hình 2024-10-28 lúc 14 15 41" src="https://github.com/user-attachments/assets/744111d4-fedf-4657-a283-5801eb910ebd">

Lưu lại và truy cập vào http://localhost:15001/payload.php để lấy payload.

<img width="941" alt="Ảnh chụp Màn hình 2024-10-28 lúc 14 15 47" src="https://github.com/user-attachments/assets/37b6fa1a-0b67-4e0e-8c25-d2bbabd18d61">

Tạo 1 file mới và dán toàn bộ payload trên và upload lên. Sau khi upload thành công, chẳng có gì xảy ra cả.

<img width="1440" alt="Ảnh chụp Màn hình 2024-10-28 lúc 14 17 08" src="https://github.com/user-attachments/assets/829a300e-3152-435b-bfac-eed149140392">

Nhưng khi nhấn vào ```Run``` thì thông tin của ```phpinfo()``` xuất hiện.

<img width="1439" alt="Ảnh chụp Màn hình 2024-10-28 lúc 14 17 15" src="https://github.com/user-attachments/assets/a6ed7a22-104f-4e0d-80bb-13733c752e79">

lúc này, thay đổi nội dung trong hàm ```eval()``` thành ```system('ls /');``` để xem bên trong thư mục ```root``` chứa những thư mục bí mật nào.

<img width="1028" alt="Ảnh chụp Màn hình 2024-10-28 lúc 14 22 06" src="https://github.com/user-attachments/assets/f3889017-326e-4fb9-888e-cca2aae7eff5">

Làm các bước tương tự và nhấn ```Run```, mọi thông tin có trong thư mục ```root``` xuất hiện.

<img width="1420" alt="Ảnh chụp Màn hình 2024-10-28 lúc 14 27 03" src="https://github.com/user-attachments/assets/6226d5da-21cc-4f20-8520-9ff34403e37d">

Ta thấy có 1 thư mục tên ```flag```, ```cat /flag``` xem bên trong có gì.

<img width="657" alt="Ảnh chụp Màn hình 2024-10-28 lúc 14 27 52" src="https://github.com/user-attachments/assets/a7c271da-017e-49a7-9733-b37bb4d2b5b7">

<img width="1440" alt="Ảnh chụp Màn hình 2024-10-28 lúc 14 28 22" src="https://github.com/user-attachments/assets/9b136a1a-1a37-47c1-9889-ba8cae7184b4">

Copy nội dung bên trong ```flag``` và gửi cho công chúa xem. Nhưng khi mình gửi cho công chúa xem thì công chúa bảo mình rời đi và quên đi những lời cô ấy vừa nói :)))))

## Lưu ý về PHP Deserialize

Bản chất của lỗi Injection là khiến cho hệ thống hiểu lầm user input là instruction.

Lỗi này xảy ra khi kẻ xấu truyền vào một chuỗi đã được serialize vào hàm unserialize để gọi những hàm sink nguy hiểm (system(), exec(),... ) trong chương trình.

Điều đặc biệt của Object Injection là hậu quả của loại lỗi này rất đa dạng (vì nó phụ thuộc vào mẫu code có sẵn của chương trình).

Như những gì ta đã làm ở trên, ```serialize``` là quá trình ```Save Game``` và ```unserialize``` là quá trình ```Load Game```.

Có 2 cách để khai thác lỗi này đó là Macgic Method trong Object –Oriented Programming (OOP) bao gồm như ```__construct()```,```__destruct()```, ```__toString()``` hoặc là 1 số magic method khác

Cách còn lại là tấn công POP (Property Oriented Programming): 
- Tận dụng Magic Methods.
- Thay đổi thuộc tính của các class.

=> Can thiệp vào luồng hoạt động của chương trình.
