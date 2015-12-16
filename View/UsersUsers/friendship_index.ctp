<?php // print_r($usersUsers); ?>
<?php $user = $this->Session->read('CurrentSessionUser');?>
<div id="content_info">
	<div class="row col-row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<?php if (!empty($usersUsersPending)) { ?>
				<h1><?php echo __('Pending Requests')?></h1>
				<table cellpadding="0" cellspacing="0">
<!--					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('user_id'); ?></th>
							<th><?php echo $this->Paginator->sort('friend_id'); ?></th>
							<th><?php echo $this->Paginator->sort('users_users_status_id'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>-->
					<tbody>
						<?php foreach ($usersUsersPending as $usersUser): ?>
							<tr>
								<td>
									<?php
										echo $usersUser['Friend']['name'] . ' ' . $usersUser['Friend']['last_name'] .
											 ' is requesting your friendship. What would you like to do?';
									?>
									<?php echo $this->Form->postLink(__('Approve'), array('action' => 'approve_friendship_petition', $usersUser['UsersUser']['id']), array('confirm' => __('Are you sure you want to approve %s friendship petition?', $usersUser['Friend']['name'] . ' ' . $usersUser['Friend']['last_name']))); ?>
									<?php echo $this->Form->postLink(__('Reject'), array('action' => 'delete', $usersUser['UsersUser']['id']), array('confirm' => __('Are you sure you want to reject %s friendship petition?', $usersUser['Friend']['name'] . ' ' . $usersUser['Friend']['last_name']))); ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			<?php } ?>
			<?php if (!empty($usersUsers)) { ?>
				<h1><?php echo __('Friends')?></h1>
				<table cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('user_id'); ?></th>
							<th><?php echo $this->Paginator->sort('friend_id'); ?></th>
							<th><?php echo $this->Paginator->sort('users_users_status_id'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($usersUsers as $usersUser): ?>
							<tr>
								<td><?php echo h($usersUser['UsersUser']['id']); ?>&nbsp;</td>
								<td>
									<?php echo $this->Html->link($usersUser['User']['name'], array('controller' => 'users', 'action' => 'view', $usersUser['User']['id'])); ?>
								</td>
								<td>
									<?php echo $this->Html->link($usersUser['Friend']['name'], array('controller' => 'users', 'action' => 'view', $usersUser['Friend']['id'])); ?>
								</td>
								<td>
									<?php echo $this->Html->link($usersUser['UsersUsersStatus']['name'], array('controller' => 'users_users_statuses', 'action' => 'view', $usersUser['UsersUsersStatus']['id'])); ?>
								</td>
								<td class="actions">
									<?php echo $this->Html->link(__('View'), array('action' => 'view', $usersUser['UsersUser']['id'])); ?>
									<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $usersUser['UsersUser']['id'])); ?>
									<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $usersUser['UsersUser']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $usersUser['UsersUser']['id']))); ?>
									<?php echo $this->Form->postLink(__('Block'), array('action' => 'block_friendship', $usersUser['UsersUser']['id']), array('confirm' => __('Are you sure you want to block %s?', $usersUser['Friend']['name'] . ' ' . $usersUser['Friend']['last_name']))); ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			<?php } ?>
			<?php if (!empty($usersUsersBlocked)) { ?>
				<h1><?php echo __('Blocked')?></h1>
				<table cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('user_id'); ?></th>
							<th><?php echo $this->Paginator->sort('friend_id'); ?></th>
							<th><?php echo $this->Paginator->sort('users_users_status_id'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($usersUsersBlocked as $usersUser): ?>
							<tr>
								<td><?php echo h($usersUser['UsersUser']['id']); ?>&nbsp;</td>
								<td>
									<?php echo $this->Html->link($usersUser['User']['name'], array('controller' => 'users', 'action' => 'view', $usersUser['User']['id'])); ?>
								</td>
								<td>
									<?php echo $this->Html->link($usersUser['Friend']['name'], array('controller' => 'users', 'action' => 'view', $usersUser['Friend']['id'])); ?>
								</td>
								<td>
									<?php echo $this->Html->link($usersUser['UsersUsersStatus']['name'], array('controller' => 'users_users_statuses', 'action' => 'view', $usersUser['UsersUsersStatus']['id'])); ?>
								</td>
								<td class="actions">
									<?php echo $this->Html->link(__('View'), array('action' => 'view', $usersUser['UsersUser']['id'])); ?>
									<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $usersUser['UsersUser']['id'])); ?>
									<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $usersUser['UsersUser']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $usersUser['UsersUser']['id']))); ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			<?php } ?>
		</div>
	</div>
</div>
