/**
 * 将查询结果 results 填充进网页
 * @results: 查询结果
 */
function fill(results) {
	var table = document.getElementById("searchTableOut");
	// 清除网页上旧的查询结果
	for (var i = table.rows.length-1; i > 0; i--) {
		table.deleteRow(i);
	}
	// 创建新的一行并按查询结果填入:未查到/查到几条
	var row = document.createElement("tr");
	var cell = document.createElement("td");
	cell.colSpan = 5;
	cell.style = "text-align: left";
	if(results.length == 0) {
		cell.innerHTML='<span style="color: red;">　沒有找到。</span>';
	} else {
		cell.innerHTML='<span style="color: red;">　檢出 '+results.length+' 條</span>';
	}
	row.appendChild(cell);
	table.appendChild(row);
	// 将查询结果填入表格
	for(var x = 0; x < results.length; x++) {
		var result = results[x];
		var row = document.createElement("tr"); //创建一行
		// ASCII 中 97-106 分别对应 a-j，网页上对应从左至右的各列
		// 用 String.fromCharCode 将数字转为对应的英文字符，如 String.fromCharCode(97) 值是 a
		for(var e = 97; e <= 101; e++) {
			var cell = document.createElement("td");
			var str = result[String.fromCharCode(e)];
			// 100 对应 d，即“北師篆”一栏，为这栏设置了 bs_font 的 css 样式
			if(e == 97) {
				cell.className = 'fhs_font top';
			}
			if(e == 98) {
				cell.className = 'fhs_font';
			}
			if(e == 99) {
				cell.className = 'center';
			}
			if(e == 100) {
				cell.className = 'center';
			}
			if(e == 101) {
				cell.className = 'center';
			}
			if(e == 99) {
				str = '<a style="text-decoration: none" target="'+str+'_blank_" href="orgpage.html?page='+str+'" style="text-decoration: none">'+str+'</a>'
			}			
			if(e == 100) {
				str = '<a style="text-decoration: none" target="'+str+'_blank_" href="2orgpage.html?page='+str+'" style="text-decoration: none">'+str+'</a>'
			}
			if(e == 101) {
				str = '<a style="text-decoration: none" target="'+str+'_blank_" href="3orgpage.html?page='+str+'" style="text-decoration: none">'+str+'</a>'
			}
			cell.innerHTML = str;
			row.appendChild(cell);
		}
		table.appendChild(row);
	}
}


var curValue = 0;
/**
 * 查询函数
 * @id: 网页中输入栏的 id(queryString7 等等)
 * @field: 数据集中列的 field(dcd1.js 中的 a-j)
 */
function search(id, field) {
	var results = new Array();
	var value = document.getElementById(id).value;
	if(!value) {
		return;
	}
	curValue=value;
	// 拼音注音模式
	var pinyin_pattern = new RegExp(value+'\\d*$');
	// 模糊匹配
	var pattern = new RegExp(value);
	// 依次查找，符合条件的加入 results 中
	for(var i = 0; i < books.length; i++) {
		switch(field) {
		case 'a':// 字头
		case 'b':// 解说
		case '':// 反切
			var fieldValue = books[i][field];
			if(fieldValue.match(pattern)) {
				results.push(books[i]);
			}
			break;
		case '':// 字头编号
			var fieldValue = books[i][field];
			if(fieldValue == value) {
				results.push(books[i]);
			}
			break;
		case '':// 反切g
			var fieldValue = books[i][field];
			if(fieldValue == value + '切') {
				results.push(books[i]);
			}
			break;
		case '':// 注音
		case '':// 拼音
			var fieldValues = books[i][field].split('<br>');
			for(var j = 0; j < fieldValues.length; j++) {
				if(fieldValues[j].match(pinyin_pattern)) {
					results.push(books[i]);
				}
			}
			break;
		case ''://部首
			var fieldValues = books[i][field].split('_');
			for(var j = 0; j < fieldValues.length; j++) {
				if(fieldValues[j].match(pattern)) {
					results.push(books[i]);
				}
			}
			break;
		}
	}
	// 用 results 填充网页
	fill(results.sort(sortNumber));
}

function sortNumber(x,y)
{
	if(x.a==curValue)
	return -1000;

if(y.a==curValue)
	return 1000;

return x.a.length - y.a.length;
}