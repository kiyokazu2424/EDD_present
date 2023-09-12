#プレゼントアプリのDB

「#データベース構築クエリ」と「#ダミー値の挿入」をDBeaverにペーストして、全てのクエリを選択してAlt + xで実行。

#リセット用クエリ
drop table present.items;
drop table present.lists;
drop table present.users;

drop database present;

create database present;


#データベース構築クエリ

create table present.users(
	id int(10) unsigned not null auto_increment primary key comment 'ID',
	nickname varchar(20) not null comment 'ニックネーム',
	pwd varchar(72) not null comment "パスワード",
	gender int(1) unsigned not null comment '性別(1:男, 2:女)',
	age int(3) unsigned not null comment '年齢',
	del_flg int(1) unsigned not null default 0 comment '消去フラグ',
	updated_at timestamp default current_timestamp on update current_timestamp comment '最終更新日時',
	updated_by varchar(10) not null comment '最終更新者'
);

create table present.lists (
	id int(10) unsigned not null auto_increment comment 'ID',
	name varchar(20) not null comment 'リスト名',
	published int(1) unsigned not null comment '1:公開、0:非公開',
	user_id int(10) unsigned not null comment 'ユーザーID',
	updated_at timestamp default current_timestamp on update current_timestamp comment '最終更新日時',
	del_flg int(1) unsigned not null default 0 comment '消去フラグ(0:活性、1:非活性)',
	updated_by varchar(10) not null comment '最終更新者',
	constraint fk_user_id
	foreign key(user_id)
	references users(id),
	primary key(id, name, user_id)
);

create table present.items(
	id int(10) unsigned not null auto_increment comment 'ID',
	name varchar(20) not null comment '商品名',
	url varchar(50) not null comment '商品URL',
	user_id int(10) unsigned not null comment 'ユーザーID',
	list_id int(10) unsigned not null comment 'リストID',
	updated_at timestamp default current_timestamp on update current_timestamp comment '最終更新日時',
	del_flg int(1) unsigned not null default 0 comment '消去フラグ(0:活性、1:非活性)',
	updated_by varchar(10) not null comment '最終更新者',
	constraint fk_item_user_id
	foreign key(user_id)
	references users(id),
	constraint fk_list_id
	foreign key(list_id)
	references lists(id),
		primary key(id, user_id, list_id)
);


#ダミー値の挿入

insert into present.users (nickname, pwd, gender, age, updated_by) values
("テスト1", "test1", 0, 20, "テスト1"),
("テスト2", "test2", 1, 21, "テスト2"),
("テスト3", "test3", 2, 22, "テスト3"),
("テスト4", "test4", 0, 23, "テスト4");

insert into present.lists(name, published, user_id, updated_by) 
values 
("リスト1", 1, 1, 'テスト1'),
("リスト2", 1, 2, 'テスト2'),
("リスト3", 1, 3, 'テスト3'),
("リスト4", 1, 4, 'テスト4');



insert into present.items (name, url, user_id, list_id, updated_by)
values 
	("りんご", "link", 1, 1, 'テスト'),
	("ゴリラ", "link", 1, 1, 'テスト'),
	("ラッパ", "link", 1, 2, 'テスト'),
	("パンツ", "link", 1, 2, 'テスト'),
	("積み木", "link", 2, 1, 'テスト2'),
	("筋肉", "link", 2, 1, 'テスト2'),
	("くま", "link", 2, 2, 'テスト2'),
	("マリオ", "link", 2, 2, 'テスト2'),
	("おにぎり", "link", 3, 1, 'テスト3'),
	("リンパ", "link", 3, 1, 'テスト3'),
	("パナマ", "link", 3, 2, 'テスト3'),
	("マニア", "link", 3, 2, 'テスト3'),
	("あご", "link", 4, 1, 'テスト4'),
	("ごま", "link", 4, 1, 'テスト4'),
	("魔王", "link", 4, 2, 'テスト4'),
	("うし", "link", 4, 2, 'テスト4');


