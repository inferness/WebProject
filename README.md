# Common Grounds
#### Video Demo: https://www.youtube.com/watch?v=QR9C85_giOo
#### Description: a platform to post and create communities. users can discuss and comment on posts to share their opinions with other users who share simillar interests
github: https://github.com/inferness/WebProject

submission note: the bulk of the file size is from the vendor files and it is far too large to include, for that reason I did not include the vendor file in the .zip

first time Clone guide (Indonesian)

1. ke file explorer, buat folder yang lo mau pake buat directory project
2. buka/cd ke foldernya terus buka cmd
3. ketik command git clone https://github.com/inferness/WebProject.git
4. Buka project di VScode
5. command prompt: composer install
6. command prompt: npm install
7. php artisan key:generate
8. php artisan migrate //atau migrae:fresh kalo udah pernah migrate
9. php artisan storage:link
10. (optional) php artisan db:seed demoSeeder
11. php artisan serve
12. di comand prompt terpisah, npm run dev


// note, karena ada penggunaan library external bernama commentify dan ada juga beberapa perubahan yang dibuat terhadap library tersebut, penampilan dan juga kerja dari sistem comment akan sedikit berbeda. jika ingin sama persis, replace folder ..\WebProject\vendor\usamamuneerchaudhary sama file dari link ini https://binusianorg-my.sharepoint.com/personal/cornelius_axel_binus_ac_id/_layouts/15/guestaccess.aspx?share=Eg_8cxGRz5hDr9UFaLD5278BJzGoRQAAnnad_q3ZfEf2bA&e=IUZE4v

tinggal extract folder usamamuneerchaudhary terus replace all

