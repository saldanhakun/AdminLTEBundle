<?php

/*
 * This file is part of the AdminLTE bundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\AdminLTEBundle\Tests\Controller;

use KevinPapst\AdminLTEBundle\Controller\NavbarController;
use KevinPapst\AdminLTEBundle\Event\MessageListEvent;
use KevinPapst\AdminLTEBundle\Event\NotificationListEvent;
use KevinPapst\AdminLTEBundle\Event\TaskListEvent;
use KevinPapst\AdminLTEBundle\Helper\ContextHelper;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Contracts\EventDispatcher\Event;
use Twig\Environment;

class NavbarControllerTest extends TestCase
{
    protected function getContainerMock(): MockObject|ContainerInterface
    {
        $container = $this->getMockBuilder(Container::class)->onlyMethods(['get', 'has'])->addMethods(['hasListeners'])->getMock();
        $container->method('has')->willReturnCallback(function ($serviceName) {
            return $serviceName === 'twig';
        });
        $twig = $this->getMockBuilder(Environment::class)->onlyMethods(['render'])->disableOriginalConstructor()->getMock();
        $twig->expects(self::once())->method('render')->willReturnCallback(function ($templateName, $values) {
            return json_encode($values);
        });
        $container->expects(self::once())->method('get')->willReturn($twig);

        return $container;
    }

    /**
     * @param int $notifications
     * @param int $messages
     * @param int $tasks
     * @return ContextHelper
     */
    protected static function getContextHelper(int $notifications, int $messages, int $tasks): ContextHelper
    {
        return new ContextHelper([
            'max_navbar_notifications' => $notifications,
            'max_navbar_messages' => $messages,
            'max_navbar_tasks' => $tasks,
        ]);
    }

    public static function getTestData(): \Generator
    {
        yield [self::getContextHelper(7, 23, 2), 7, NotificationListEvent::class, 'notificationsAction', null, 'notifications'];
        yield [self::getContextHelper(7, 23, 2), 23, MessageListEvent::class, 'messagesAction', null, 'messages'];
        yield [self::getContextHelper(7, 23, 2), 2, TaskListEvent::class, 'tasksAction', null, 'tasks'];
        yield [self::getContextHelper(1, 20, 30), 7, NotificationListEvent::class, 'notificationsAction', 7, 'notifications'];
        yield [self::getContextHelper(1, 20, 30), 23, MessageListEvent::class, 'messagesAction', 23, 'messages'];
        yield [self::getContextHelper(1, 20, 30), 2, TaskListEvent::class, 'tasksAction', 2, 'tasks'];
    }

    /**
     * @dataProvider getTestData
     */
    public function testMessagesAction(Contexthelper $helper, $expectedMax, $expectedEventClass, $action, $actionParam, $responseKey)
    {
        $dispatcher = $this->getMockBuilder(EventDispatcher::class)->onlyMethods(['dispatch', 'hasListeners'])->getMock();
        $dispatcher->expects(self::once())->method('hasListeners')->willReturnCallback(
            function ($eventName) use ($expectedEventClass) {
                self::assertEquals($expectedEventClass, $eventName);

                return true;
            }
        );

        $dispatcher->expects(self::once())->method('dispatch')->willReturnCallback(
            function (NotificationListEvent|MessageListEvent|TaskListEvent|null $event) use ($expectedMax, $expectedEventClass): NotificationListEvent|MessageListEvent|TaskListEvent {
                self::assertInstanceOf($expectedEventClass, $event);
                self::assertEquals($expectedMax, $event->getMax());

                return $event;
            }
        );

        $sut = new NavbarController($dispatcher, $helper);
        $sut->setContainer($this->getContainerMock());
        $response = $sut->{$action}($actionParam);
        $result = json_decode($response->getContent(), true);
        $this->assertEquals([$responseKey => [], 'total' => 0], $result);
    }
}
