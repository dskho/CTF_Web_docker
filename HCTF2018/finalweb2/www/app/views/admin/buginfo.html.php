<?php echo $this->html->script(['bootstrap-select.min']); ?>
<?php echo $this->html->style(['bootstrap-select.min']); ?>
<div class="row">
	<div class="col-md-1 sidebar">
		<ul class="list-group">
			<a href="/admin" class="list-group-item">项目概况</a>
			<a href="/admin/users" class="list-group-item">查看用户</a>
			<a href="/admin/bugs" class="list-group-item active">漏洞列表</a>
			<a href="/admin/news" class="list-group-item">文章列表</a>
			<a href="#" class="list-group-item">漏洞评论</a>
			<a href="#" class="list-group-item">文章评论</a>
		</ul>
	</div>
	<div class="col-md-6">
		<form class="form-horizontal" action="?func=accept" method="post">
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">标题</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="name" value="<?= $bug->title ?>" disabled="disabled">
				</div>
			</div>
			<div class="form-group">
				<label for="content" class="col-sm-2 control-label">内容</label>
				<div class="col-sm-10">
					<textarea type="text" class="form-control" id="content" rows="6" disabled="disabled"><?php echo base64_decode($bug->content); ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<img id="pic" src="<?= $bug->img_path ?>" width="200px" height="200px">
				</div>
			</div>
			<hr>
			<div class="form-group">
				<div class="col-sm-5 col-sm-offset-2">
					<select name="risk" class="form-control">
						<option value="1">低危</option>
						<option value="2">中危</option>
						<option value="3">高危</option>
					</select>
				</div>
				<div class="col-sm-3">
					<input type="number" name="score" class="form-control" placeholder="分数" value="0">
				</div>
				<div class="col-sm-2">
					<button type="submit" class="btn btn-success">审核通过</button>
				</div>

			</div>
			<div class="form-group">
				<div class="col-sm-5 col-sm-offset-2">
					<a href="?func=public" class="btn btn-info" style="margin-right: 10px">公开详情</a>
					<button class="btn btn-danger" onclick="remove()">删除漏洞</button>
				</div>
			</div>
		</form>
	</div>

</div>
<script>
	function remove() {
		$.post("/files/remove", {filename: $('#pic').attr('src')});
		$.get("?func=del");
	}
</script>