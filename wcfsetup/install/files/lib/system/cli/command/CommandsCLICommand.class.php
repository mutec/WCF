<?php
namespace wcf\system\cli\command;
use wcf\system\CLIWCF;
use wcf\util\CLIUtil;

/**
 * Lists available commands.
 * 
 * @author	Tim Duesterhus
 * @copyright	2001-2017 WoltLab GmbH
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	WoltLabSuite\Core\System\Cli\Command
 */
class CommandsCLICommand implements ICLICommand {
	/**
	 * @inheritDoc
	 */
	public function execute(array $parameters) {
		$output = [];
		
		foreach (CLICommandHandler::getCommands() as $name => $command) {
			if ($command instanceof IArgumentedCLICommand) $output[] = $command->getUsage();
			else $output[] = $name;
		}
		
		CLIWCF::getReader()->println(CLIUtil::generateList($output));
	}
	
	/**
	 * @inheritDoc
	 */
	public function canAccess() {
		return true;
	}
}
