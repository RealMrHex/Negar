<?php

namespace Modules\User\Filament\Manager\Resources\UserResource\Pages;

use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\V1\User\UserFields;
use Modules\User\Enums\V1\AccountStatus\AccountStatus;
use Modules\User\Filament\Manager\Resources\UserResource;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    /**
     * Get header actions
     *
     * @return array
     */
    protected function getHeaderActions(): array
    {
        return [
            $this->verifyEmailAction(),
            $this->verifyMobileAction(),
            $this->restrictAccessAction(),
            $this->deleteAction(),
        ];
    }

    #region Verify Email Action

    /**
     * Verify email action
     *
     * @return Action
     */
    protected function verifyEmailAction(): Action
    {
        return Action::make('verify_email')
                     ->label(__('v1.user::filament.action.user.email_verify.label'))
                     ->color(__('v1.user::filament.action.user.email_verify.color'))
                     ->visible(fn($record) => $this->canVerifyEmail($record))
                     ->requiresConfirmation()
                     ->action(fn(Model $record) => $this->verifyEmailActionProcessor($record))
                     ->modalIcon(__('v1.user::filament.action.user.email_verify.modal.icon'))
                     ->modalCloseButton(false)
        ;
    }

    /**
     * Verify email action processor
     *
     * @param Model $record
     *
     * @return void
     */
    protected function verifyEmailActionProcessor(Model $record): void
    {
        $record->update([UserFields::EMAIL_VERIFIED_AT => Carbon::now()]);
        $this->refreshFormData([UserFields::EMAIL_VERIFIED_AT]);
        Notification
            ::make()
            ->title(__('v1.user::filament.action.user.email_verify.notification.content'))
            ->success()
            ->icon(__('v1.user::filament.action.user.email_verify.notification.icon'))
            ->send()
        ;
    }

    /**
     * Can verify email
     *
     * @param Model $record
     *
     * @return bool
     */
    protected function canVerifyEmail(Model $record): bool
    {
        return isset($record->{UserFields::EMAIL}) && empty($record->{UserFields::EMAIL_VERIFIED_AT}) && $record->{UserFields::ACCOUNT_TYPE}->notClassified();
    }
    #endregion

    #region Verify Mobile Action
    /**
     * Verify mobile action
     *
     * @return Action
     */
    protected function verifyMobileAction(): Action
    {
        return Action::make('verify_mobile')
                     ->label(__('v1.user::filament.action.user.mobile_verify.label'))
                     ->color(__('v1.user::filament.action.user.mobile_verify.color'))
                     ->visible(fn(Model $record) => $this->canVerifyMobile($record))
                     ->requiresConfirmation()
                     ->action(fn(Model $record) => $this->verifyMobileActionProcessor($record))
                     ->modalIcon(__('v1.user::filament.action.user.mobile_verify.modal.icon'))
                     ->modalCloseButton(false)
        ;
    }

    /**
     * Verify mobile action processor
     *
     * @param Model $record
     *
     * @return void
     */
    protected function verifyMobileActionProcessor(Model $record): void
    {
        $record->update([UserFields::MOBILE_VERIFIED_AT => Carbon::now()]);
        $this->refreshFormData([UserFields::MOBILE_VERIFIED_AT]);
        Notification
            ::make()
            ->title(__('v1.user::filament.action.user.mobile_verify.notification.content'))
            ->success()
            ->icon(__('v1.user::filament.action.user.mobile_verify.notification.icon'))
            ->send()
        ;
    }

    /**
     * Can verify mobile
     *
     * @param Model $record
     *
     * @return bool
     */
    protected function canVerifyMobile(Model $record): bool
    {
        return isset($record->{UserFields::MOBILE}) && empty($record->{UserFields::MOBILE_VERIFIED_AT}) && $record->{UserFields::ACCOUNT_TYPE}->notClassified();
    }
    #endregion

    #region Restrict Access Action
    /**
     * Restrict Access Action
     *
     * @return Action
     */
    protected function restrictAccessAction(): Action
    {
        return Action::make('restrict_access')
                     ->label(__('v1.user::filament.action.user.restrict_access.label'))
                     ->color(__('v1.user::filament.action.user.restrict_access.color'))
                     ->visible(fn(Model $record) => $this->canRestrictAccess($record))
                     ->requiresConfirmation()
        ;
    }

    /**
     * Can restrict access
     *
     * @param Model $record
     *
     * @return bool
     */
    protected function canRestrictAccess(Model $record): bool
    {
        return $record->{UserFields::ACCOUNT_STATUS} === AccountStatus::Free && $record->{UserFields::ID} !== auth()->id();
    }

    #endregion

    #region Delete Action

    /**
     * Delete action
     *
     * @return DeleteAction
     */
    protected function deleteAction()
    {
        return DeleteAction::make()->visible(fn(Model $record) => $this->canDelete($record));
    }

    /**
     * Can delete record
     *
     * @param Model $record
     *
     * @return bool
     */
    protected function canDelete(Model $record): bool
    {
        return $record->{UserFields::ACCOUNT_TYPE}->notClassified() && $record->{UserFields::ID} !== auth()->id();
    }
    #endregion
}
