<?php declare(strict_types = 1);

namespace Nish\PHPStan\Rules;

use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleLevelHelper;
use PHPStan\Testing\RuleTestCase;

/**
 * @extends \PHPStan\Testing\RuleTestCase<EchoRule>
 */
class EchoHtmlRuleTest extends RuleTestCase
{

	protected function getRule(): Rule
	{
		return new EchoHtmlRule(
			new RuleLevelHelper($this->createBroker(), true, false, true)
		);
	}

	public function testEchoRule(): void
	{
		$this->analyse([__DIR__ . '/data/echo.php'], [
			[
				'Parameter #1 (array()) of echo cannot be converted to string.',
				7,
			],
			[
				'Parameter #1 (stdClass) of echo cannot be converted to string.',
				9,
			],
			[
				'Parameter #1 (array()) of echo cannot be converted to string.',
				11,
			],
			[
				'Parameter #2 (stdClass) of echo cannot be converted to string.',
				11,
			],
			[
				'Parameter #1 (Closure(): mixed) of echo cannot be converted to string.',
				13,
			],
			[
				'Parameter #1 (\'string\'|array(\'string\')) of echo cannot be converted to string.',
				17,
			],
		]);
	}

}