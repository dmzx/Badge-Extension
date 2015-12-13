<?php
/**
*
* @package phpBB Extension - Badge
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\badge\migrations;

class update_table extends \phpbb\db\migration\migration
{
	public function update_data()
	{
		return array(
			array('custom', array(array($this, 'install_bbcode_for_badge'))),
		);
	}

	public function install_bbcode_for_badge()
	{
		$bbcode_data = array(
			'bagdge=' => array(
				'bbcode_helpline'		=> '[badge]SUBJECT-STATUS-COLOR[/badge]',
				'bbcode_match'			=> '[badge]{INTTEXT1}-{INTTEXT2}-{INTTEXT3}[/badge]',
				'bbcode_tpl'			=> '<img src="https://img.shields.io/badge/{INTTEXT1}-{INTTEXT2}-{INTTEXT3}.svg" alt="" style="margin-bottom: -5px;" />',
			),
		);

		global $db, $request, $user;
		$acp_manager = new \dmzx\badge\includes\acp_manager($db, $request, $user, $this->phpbb_root_path, $this->php_ext);
		$acp_manager->install_bbcodes($bbcode_data);
	}
}
